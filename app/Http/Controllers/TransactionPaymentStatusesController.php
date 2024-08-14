<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TransactionPaymentStatusCreateRequest;
use App\Http\Requests\TransactionPaymentStatusUpdateRequest;
use App\Repositories\TransactionPaymentStatusRepository;
use App\Validators\TransactionPaymentStatusValidator;

use App\Entities\Transaction;
use App\Entities\TransactionPaymentStatus;

/**
 * Class TransactionPaymentStatusesController.
 *
 * @package namespace App\Http\Controllers;
 */
class TransactionPaymentStatusesController extends Controller
{
    /**
     * @var TransactionPaymentStatusRepository
     */
    protected $repository;

    /**
     * @var TransactionPaymentStatusValidator
     */
    protected $validator;

    /**
     * TransactionPaymentStatusesController constructor.
     *
     * @param TransactionPaymentStatusRepository $repository
     * @param TransactionPaymentStatusValidator $validator
     */
    public function __construct(TransactionPaymentStatusRepository $repository, TransactionPaymentStatusValidator $validator)
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

        $data = TransactionPaymentStatus::select('*');

        if($request->has('transaction_id')){
            $data = $data->where('transaction_id',$request->transaction_id);
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
     * @param  TransactionPaymentStatusCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TransactionPaymentStatusCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $check = TransactionPaymentStatus::where('transaction_id',$request->transaction_id)
                                    ->where('status',$request->status)
                                    ->first();

            if($check){
                $response = [
                    'status'  => false,
                    'message' => 'Transaction Status already exist',
                ];
    
                return response()->json($response, 500);
            }else{
                $updateTrans  = Transaction::find($request->transaction_id);
                if($updateTrans){
                    $updateTrans->payment_status = $request->status;
                    $updateTrans->save();

                    $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

                    $data = $this->repository->create($request->all());

                    $response = [
                        'status'  => true,
                        'message' => 'Transaction Payment Status created.',
                        'data'    => $data->toArray(),
                    ];

                    DB::commit();
                    return response()->json($response, 200);
                }else{
                    $response = [
                        'status'  => false,
                        'message' => 'Transaction Status failed to updated',
                    ];
        
                    return response()->json($response, 500);
                }
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
