<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserChildCreateRequest;
use App\Http\Requests\UserChildUpdateRequest;
use App\Repositories\UserChildRepository;
use App\Validators\UserChildValidator;

use App\Entities\UserChild;

/**
 * Class UserChildsController.
 *
 * @package namespace App\Http\Controllers;
 */
class UserChildsController extends Controller
{
    /**
     * @var UserChildRepository
     */
    protected $repository;

    /**
     * @var UserChildValidator
     */
    protected $validator;

    /**
     * UserChildsController constructor.
     *  
     * @param UserChildRepository $repository
     * @param UserChildValidator $validator
     */
    public function __construct(UserChildRepository $repository, UserChildValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserChildCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserChildCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $check = UserChild::where('user_id', $request->user_id)
                                ->where('child_id', $request->child_id)
                                ->first();

            if($check){
                DB::rollBack();
                return response()->json([
                    'status'    => false, 
                    'error'     => 'Data already exist.'
                ], 400);
            }

            $data = $this->repository->create($request->all());

            $response = [
                'status'  => true,
                'message' => 'UserChild created.',
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
    public function show($user_id)
    {
        $data = UserChild::where('user_id', $user_id)->with('user','child')->get();
        
        $response = [
            'status'  => true,
            'message' => 'Success',
            'data'    => $data,
        ];

        return response()->json($response, 200);
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
                    'message' => 'UserChild deleted.'
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
