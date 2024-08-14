<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MerchantCreateRequest;
use App\Http\Requests\MerchantUpdateRequest;
use App\Repositories\MerchantRepository;
use App\Validators\MerchantValidator;

use App\Entities\Merchant;
use App\Entities\Role;
use App\Entities\User;

/**
 * Class MerchantsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MerchantsController extends Controller
{
    /**
     * @var MerchantRepository
     */
    protected $repository;

    /**
     * @var MerchantValidator
     */
    protected $validator;

    /**
     * MerchantsController constructor.
     *
     * @param MerchantRepository $repository
     * @param MerchantValidator $validator
     */
    public function __construct(MerchantRepository $repository, MerchantValidator $validator)
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

        $data = Merchant::select('*');

        if($request->has('search')){
            $data = $data->whereRaw('lower(name) like (?)',["%{$request->search}%"]);
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
     * @param  MerchantCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MerchantCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $check = User::where('username', $request->username)
                            ->orWhere('email',$request->email)
                            ->first();
            if($check){
                return response()->json([
                    'status'=> false, 
                    'error'=> 'Username already used'
                ], 403);
            }

            //check for role merchant
            $role = Role::where('name','Merchant')->first();
            if($role){
                $role_id = $role->id;
            }else{
                return response()->json([
                    'status'=> false, 
                    'error'=> 'Role not found'
                ], 404);
            }
            
            $user = User::create([
                            'role_id'   => $role_id,
                            'username'  => $request->username,
                            'fullname'  => $request->fullname,
                            'email'     => $request->email,
                            'password'  => bcrypt($request->password),
                        ]);

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $reqData = $request->all();
            $reqData['user_id'] = $user->id;
            $data = $this->repository->create($reqData);

            $response = [
                'status'  => true,
                'message' => 'Merchant created.',
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
     * @param  MerchantUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MerchantUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $data = $this->repository->update($request->all(), $id);

            $response = [
                'status'  => true,
                'message' => 'Merchant updated.',
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
                    'message' => 'Merchant deleted.'
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

    /**
     * Get number from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function lastestNumber(Request $request)
    {
        DB::beginTransaction();
        try {
            $merchant = Merchant::select('no')->orderBy('no','DESC')->first();

            $response = [
                'status'  => true,
                'message' => 'Success',
                'data'    => $merchant
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
     * Set balance the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function updateBalance(Request $request)
    {
        try {
            $merchant = Merchant::where('no',$request->no)->first();
            if($merchant){
                $merchant->balance = $request->balance;
                $merchant->save();

                DB::commit();
                return response()->json([
                    'status' => true
                ], 200);
            }else{
                DB::rollBack();
                return response()->json([
                    'status' => false
                ], 200);
            }
        } catch (Exception $e) {
            // For rollback data if one data is error
            DB::rollBack();
            return response()->json([
                'status' => false
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            // For rollback data if one data is error
            DB::rollBack();
            return response()->json([
                'status' => false
            ], 200);
        }
    }

    public function getMerchant(Request $request){
        $data = Merchant::where('no',$request->no)->first();
        
        if($data){
            $response = [
                'status'  => true,
                'message' => 'Success',
                'data'    => $data,
            ];

            return response()->json($response, 200);
        }else{
            $response = [
                'status'  => false,
                'message' => 'Not found'
            ];

            return response()->json($response, 404);
        }
    }
}
