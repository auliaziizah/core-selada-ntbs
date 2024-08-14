<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RevenueCreateRequest;
use App\Http\Requests\RevenueUpdateRequest;
use App\Repositories\RevenueRepository;
use App\Validators\RevenueValidator;

use App\Entities\Revenue;
use App\Entities\Transaction;
use App\Entities\Merchant;
use App\Entities\Group;
use App\Entities\GroupSchema;
use App\Entities\GroupSchemaShareholder;
use App\Entities\UserGroup;

/**
 * Class RevenuesController.
 *
 * @package namespace App\Http\Controllers;
 */
class RevenuesController extends Controller
{
    /**
     * @var RevenueRepository
     */
    protected $repository;

    /**
     * @var RevenueValidator
     */
    protected $validator;

    /**
     * RevenuesController constructor.
     *
     * @param RevenueRepository $repository
     * @param RevenueValidator $validator
     */
    public function __construct(RevenueRepository $repository, RevenueValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $data = Revenue::select('*');

        if($request->has('merchant_id')){
            $data = $data->where('merchant_id',$request->merchant_id);
        }

        if($request->has('start_date')){
            $data = $data->whereDate('date','>=',$request->start_date);
        }

        if($request->has('end_date')){
            $data = $data->whereDate('date','<=',$request->end_date);
        }

        $total = $data->count();
    
        if($request->has('limit')){
            $data->take($request->get('limit'));
            
            if($request->has('offset')){
            	$data->skip($request->get('offset'));
            }
        }

        if($request->has('order_type')){
            if($request->get('order_type') == 'asc'){
                if($request->has('order_by')){
                    $data->orderBy($request->get('order_by'));
                }else{
                    $data->orderBy('created_at');
                }
            }else{
                if($request->has('order_by')){
                    $data->orderBy($request->get('order_by'), 'desc');
                }else{
                    $data->orderBy('created_at', 'desc');
                }
            }
        }else{
            $data->orderBy('created_at', 'desc');
        }

        $data = $data->with('location')->get();

        foreach($data as $item){
            $item->profit_merchant  = $item->amount * $profit_merchant->value/100;
            $item->profit_office    = $item->amount * $profit_office->value/100;
            $item->profit_owner     = $item->amount * $profit_owner->value/100;
        }

        $response = [
            'status'    => true, 
            'message'   => 'Success',
            'total_row' => $total,
            'data'      => $data,
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RevenueCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RevenueCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $revenue = Revenue::where('merchant_id', $request->merchant_id) 
                            ->where('type',2)
                            ->where('date',$request->date)
                            ->first();
            
            if($revenue){
                DB::rollBack();

                $response = [
                    'status'  => false,
                    'error' => 'Revenue for today already exist.'
                ];
    
                return response()->json($response, 400);
            }


            $total_price = Transaction::where('merchant_id', $request->merchant_id)
                                    ->where('is_settled', 1)
                                    ->where('is_revenued', 0)
                                    ->sum('price');
            
            $reqData = $request->all();
            $reqData['type']    = 2;
            $reqData['amount']  = $total_price;

            $data = $this->repository->create($reqData);

            // Update status on transactions table
            $updateTrans = [
                'is_revenued'    => 1,
                'revenued_at'    => Carbon::now(),
            ];

            $transaction = Transaction::where('merchant_id', $request->merchant_id)
                                    ->where('is_settled', 1)
                                    ->where('is_revenued', 0)
                                    ->update($updateTrans);

            $response = [
                'status'  => true,
                'message' => 'Revenue created.',
                'data'    => $data->toArray(),
            ];

            DB::commit();
            return response()->json($response, 200);
        } catch (Exception $e) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        } catch (\Illuminate\Database\QueryException $e) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TransactionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function storeTemp(RevenueCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $revenue = Revenue::where('location_id', $request->location_id) 
                            ->where('type',1)
                            ->where('date',$request->date)
                            ->first();
            
            if($revenue){
                $total_price = Transaction::where('location_id', $request->location_id)
                                    ->where('status', 1)
                                    ->whereDate('settled_at', $request->date)
                                    ->sum('total_price');

                $total_disc = Transaction::where('location_id', $request->location_id)
                                        ->where('status', 1)
                                        ->whereDate('settled_at', $request->date)
                                        ->sum('total_discount');
                
                $total = $total_price - $total_disc;
                $revenue->amount = $total;
                $revenue->save();

                $response = [
                    'status'  => true,
                    'message' => 'Revenue updated.',
                    'data'    => $revenue->toArray(),
                ];

                DB::commit();
                return response()->json($response, 200);
            }else{
                $total_price = Transaction::where('location_id', $request->location_id)
                                    ->where('status', $request->type)
                                    ->whereDate('settled_at', $request->date)
                                    ->sum('total_price');

                $total_disc = Transaction::where('location_id', $request->location_id)
                                        ->where('status', $request->type)
                                        ->whereDate('settled_at', $request->date)
                                        ->sum('total_discount');
                
                $total = $total_price -  $total_disc;
                $reqData = $request->all();
                $reqData['type'] = 1;
                $reqData['amount'] = $total;

                $data = $this->repository->create($reqData);

                $response = [
                    'status'  => true,
                    'message' => 'Revenue created.',
                    'data'    => $data->toArray(),
                ];

                DB::commit();
                return response()->json($response, 200);
            }
        } catch (Exception $e) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        } catch (\Illuminate\Database\QueryException $e) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        }
    }

    public function getRevenue(Request $request)
    {
        DB::beginTransaction();
        try {
            $date       = $request->date;
            $group_id   = $request->group_id;
            $amount     = $this->calculate($group_id, $date);
            $totalTrx   = $this->countTrx($group_id, $date);
            
            // Check 
            $groupSchema = GroupSchema::where('group_id', $group_id)->first();
            if($groupSchema){
                $revenue = $amount * $groupSchema->share/100;

                // Check if this group is shareable
                if($groupSchema->is_shareable ==  true){
                    $shareholders = GroupSchemaShareholder::where('group_schema_id', $groupSchema->id)
                                                        ->with('shareholder')
                                                        ->get();
                    foreach($shareholders as $sh){
                        $sh->revenue = $sh->share/100 * $revenue;
                    }
                }else{
                    $shareholders = [];
                }

                $response = [   
                        'status'        => true, 
                        'message'       => 'Success',
                        'revenue'       => $revenue,
                        'shareholder'   => $shareholders
                ];
            }else{
                return response()->json([
                    'status'    => false, 
                    'error'     => 'Group has not schema'
                ], 404);
            }

            DB::commit();
            return response()->json($response, 200);
        } catch (Exception $e) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        } catch (\Illuminate\Database\QueryException $e) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        }
    }

    private function calculate($group_id, $date)
    {
        $groups = Group::where('parent_id', $group_id)->get();
        $result = 0;
        foreach ($groups as $item){
            // Check if id is leaf or not
            $check = Group::where('parent_id', $item->id)->first();
            if($check){
                $result = $this->calculate($item->id, $date);
            }else{
                // Count amount of transactions
                $userGroups = UserGroup::where('group_id', $item->id)->get();
                foreach($userGroups as $userGroup){
                    $merchant = Merchant::where('user_id', $userGroup->user_id)->first();
                    if($merchant){
                        $revenue = Revenue::where('merchant_id', $merchant->id)
                                        ->whereDate('date', $date)
                                        ->first();

                        if($revenue){
                            $result = $result + $revenue->amount;
                        }
                    }
                }
            }
        }
        return $result;
    }

    private function countTrx($group_id, $date)
    {
        $groups = Group::where('parent_id', $group_id)->get();
        $result = 0;
        foreach ($groups as $item){
            // Check if id is leaf or not
            $check = Group::where('parent_id', $item->id)->first();
            if($check){
                $result = $this->calculate($item->id, $date);
            }else{
                // Count amount of transactions
                $userGroups = UserGroup::where('group_id', $item->id)->get();
                foreach($userGroups as $userGroup){
                    $merchant = Merchant::where('user_id', $userGroup->user_id)->first();
                    if($merchant){
                        $revenue = Revenue::where('merchant_id', $merchant->id)
                                        ->whereDate('date', $date)
                                        ->first();

                        if($revenue){
                            $result = $result + 1;
                        }
                    }
                }
            }
        }
        return $result;
    }
}
