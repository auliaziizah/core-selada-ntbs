<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TopupCreateRequest;
use App\Http\Requests\TopupUpdateRequest;
use App\Repositories\TopupRepository;
use App\Validators\TopupValidator;
use Carbon\Carbon;

use App\Entities\Topup;
use App\Entities\TopupCounter;
use App\Entities\Merchant;

/**
 * Class TopupsController.
 *
 * @package namespace App\Http\Controllers;
 */
class TopupsController extends Controller
{
    /**
     * @var TopupRepository
     */
    protected $repository;

    /**
     * @var TopupValidator
     */
    protected $validator;

    /**
     * TopupsController constructor.
     *
     * @param TopupRepository $repository
     * @param TopupValidator $validator
     */
    public function __construct(TopupRepository $repository, TopupValidator $validator)
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

        $data = Topup::select('*');

        if($request->has('search')){
            $data = $data->whereRaw('lower(note) like (?)',["%{$request->search}%"]);
        }

        if($request->has('date')){
            $data = $data->whereDate('date',$request->date);
        }

        if($request->has('status')){
            $data = $data->where('status',$request->status);
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

        $data = $data->get();

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
     * @param  TopupCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TopupCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            // $date = date("Ymd");

            $topCounter = TopupCounter::whereDate('date', Carbon::today())->first();
            if($topCounter){
                $maxCounter = $topCounter->counter + 1;
                $topCounter->counter = $topCounter->counter + 1;
                $topCounter->save();
            }else{
                $topCounter = new TopupCounter;
                $topCounter->counter = 1;
                $topCounter->save();

                $maxCounter = 1;
            }
            
            $reqData = $request->all();
            $reqData['amount_unique'] = $request->amount + $maxCounter;
            $data = $this->repository->create($reqData);

            $response = [
                'status'  => true,
                'message' => 'Topup created.',
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->repository->find($id);
        
        $response = [
            'status'  => true,
            'message' => 'Success',
            'data'    => $data,
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TopupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TopupUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            if($request->status == 1){
                $topup = Topup::find($id);
                if($topup){
                    if($topup->status == 0){
                        $topup->status = 1;
                        $topup->save();

                        $merchant = Merchant::find($topup->merchant_id);
                        if($merchant){
                            $merchant->balance = $merchant->balance + $topup->amount_unique;
                            $merchant->save();
                        }else{
                            $response = [
                                'status'=> false,
                                'error' => 'Mercant not found.'
                            ];
    
                            DB::rollback();
                            return response()->json($response, 404);
                        }
                    }else{
                        $response = [
                            'status'=> false,
                            'error' => 'Topup status already accepted or rejected.'
                        ];

                        DB::rollback();
                        return response()->json($response, 500);
                    }
                }else{
                    $response = [
                        'status'=> false,
                        'error' => 'Topup not found.'
                    ];

                    DB::rollback();
                    return response()->json($response, 404);
                }
            }
            

            $response = [
                'status'  => true,
                'message' => 'Topup updated.',
                'data'    => $topup->toArray(),
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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $deleted = $this->repository->delete($id);

            if($deleted){
                $response = [
                    'status'  => true,
                    'message' => 'Topup deleted.'
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
}
