<?php
// Connect to ARDI

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;
use Carbon\Carbon;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TransactionCreateRequest;
use App\Http\Requests\TransactionUpdateRequest;
use App\Repositories\TransactionRepository;
use App\Validators\TransactionValidator;
use Ixudra\Curl\Facades\Curl;

use App\Entities\Merchant;
use App\Entities\Service;
use App\Entities\Transaction;
use App\Entities\TransactionStatus;
use App\Entities\transactionPaymentStatus;

use App\Http\Controllers\CoresController as Core;

/**
 * Class TransactionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class TransactionsController extends Controller
{
    /**
     * @var TransactionRepository
     */
    protected $repository;

    /**
     * @var TransactionValidator
     */
    protected $validator;

    /**
     * TransactionsController constructor.
     *
     * @param TransactionRepository $repository
     * @param TransactionValidator $validator
     */
    public function __construct(TransactionRepository $repository, TransactionValidator $validator)
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

        $data = Transaction::select('*');

        if($request->has('search')){
            $data = $data->where('code','iLIKE',"%{$request->search}%");
        }

        if($request->has('merchant_id')){
            $data = $data->where('merchant_id',$request->merchant_id);
        }

        if($request->has('status')){
            $data = $data->where('status',$request->status);
        }

        if($request->has('payment_status')){
            $data = $data->where('payment_status',$request->payment_status);
        }

        if($request->has('start_date')){
            $data = $data->where('created_at','>=',$request->start_date);
        }

        if($request->has('end_date')){
            $data = $data->where('created_at','<=',$request->end_date);
        }

	$data = $data->where('is_development','!=',1);
        $data = $data->where('is_marked_as_failed','!=',1);

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

        $data = $data->with(['merchant.terminal','merchant.user','service.product.provider.category','transactionStatus','transactionPaymentStatus']);

        $data = $data->get();

        foreach($data as $item){

            if ($item->merchant->city != null && !is_array($item->merchant->city)){
                $city_text = $item->merchant->city;
                $item->merchant->city = ["id" => 0, "province_id" => 0, "name" => $city_text];    
            }
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
     * @param  TransactionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TransactionCreateRequest $request)
    {
        // DB::beginTransaction();
        try {
            // Generate Code Transaction
                $nextId                 = DB::table('transactions')->max('id') + 1; // Postgres
                $date                   = date("YmdHis");
                $requestData            = $request->all();
                $requestData['code']    = 'BL'.(string)$date.(string)$nextId;

                $check = Transaction::where('code',$requestData['code'])->first();
                if($check){
                    $response = [
                        'status'  => true,
                        'message' => 'Transaction already created.',
                        'data'    => $data->toArray(),
                    ];
        
                    // DB::rollback();
                    return response()->json($response, 200);
                }
            // End Generate and check code

            // Check Service
            $service = Service::find($request->service_id);
            if(!$service){
                return response()->json([
                    'status'    => false, 
                    'error'     => 'Service not registered'
                ], 404);
            }

            if(($request->has('price'))&&($request->has('vendor_price'))){
                $requestData['price']       = $request->price;
                $requestData['vendor_price']= $request->vendor_price;
            }else{
                $requestData['price']       = $service->markup + $service->biller_price + $service->system_markup;
                $requestData['vendor_price']= $service->biller_price;
            }
            
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data   = $this->repository->create($requestData);
            $id     = DB::getPdo()->lastInsertId();
            
            $data = Transaction::with('service.product.provider.category')->find($id);

            $merchant = Merchant::where('id', $data->merchant_id)->with('terminal')->first();
            
            //Connect Biller
            $service = Service::where('id',$request->service_id)->with('biller','product.provider.category')->first();
            if($service){
                $reqData = new Request([
                    'cmd'   => $service->code,
                    'tid'   => $requestData['code'],
                    'nop'   => $request->merchant_no,
                    'voc'   => $service->product->code
                ]);
                
                // Komen hanya untuk kebutuhan dev local saja
                $trx = (new Core)->transaction($reqData); // ini jika biller yang digunakan lebih dr 1
                
                $updateTrans  = Transaction::find($id);
                $updateTrans->note = (is_array($trx) && array_key_exists('data', $trx)) ? $trx['data'] : '{}'; //hanya untuk kebutuhan dev local saja
                $updateTrans->save();
                
                // ByPass conn hanya untuk kebutuhan dev local saja
                // $trx            = [];
                // $trx['status']  = true;
                // $trx['code']    = 1;
                if(is_array($trx) && $trx['status'] == true){
                    if($trx['code'] == 1){

                        $transactionStatus = new TransactionStatus;
                        $transactionStatus->transaction_id  = $id;
                        $transactionStatus->status          = 1;
                        $transactionStatus->save();
                        
                        $data  = Transaction::find($id);
                        $data->status = 1;
                        $data->save();

                        $response = [
                            'status'  => true,
                            'message' => 'Transaction created.',
                            'data'    => $data->toArray(),
                        ];
                        
                        // DB::commit();
                        return response()->json($response, 200);
                    }elseif($trx['code'] == 0){
                        $data  = Transaction::find($id);
                        $response = [
                            'status'  => true,
                            'message' => 'Transaction created.',
                            'data'    => $data->toArray(),
                        ];
                        
                        // DB::commit();
                        return response()->json($response, 200);
                    }else{
			$data  = Transaction::find($id);
                        $data->status = 2;

                        $imei = $merchant->terminal->imei;
                        $dateString = (string)$date;
                        $stan = $data->stan;
                        
                        if (is_null($data->is_reversed) || !$data->is_reversed 
                                || $data->is_reversed == 'null' 
                                || $data->is_reversed == 0 || $data->is_reversed == '0'
                                || $data->is_reversed == 2 || $data->is_reversed == '2'){

                                $reversalStatus = $this->reversal($imei, $dateString, $stan);
                                if ($reversalStatus == 1){
                                        $data->is_reversed = 1;
                                }
                                else{
                                        $data->is_reversed = 2;
                                }
                        }
			$data->save();

			$response = [
		            'status'  => false,
                	    'message' => 'Transaction failed',
			    'data'    => $data->toArray(),
        	        ];
    
	                return response()->json($response, 200);
                    }
                }else{
		    $data  = Transaction::find($id);
                    $data->status = 2;

                    $imei = $merchant->terminal->imei;
                    $dateString = (string)$date;
                    $stan = $data->stan;
                    if (is_null($data->is_reversed) || !$data->is_reversed 
                                || $data->is_reversed == 'null' 
                                || $data->is_reversed == 0 || $data->is_reversed == '0'
                                || $data->is_reversed == 2 || $data->is_reversed == '2'){

                    	$reversalStatus = $this->reversal($imei, $dateString, $stan);
                        if ($reversalStatus == 1){
                        	$data->is_reversed = 1;
                        }
                        else{
                                $data->is_reversed = 2;
                        }
                    }
                    $data->save();

                    $response = [
                    	'status'  => false,
                        'message' => 'Transaction failed',
                        'data'    => $data->toArray(),
                    ];

	            return response()->json($response, 200);
                }
            }else{
                $response = [
                    'status'  => false,
                    'message' => 'Service not found but Transaction created.'
                ];
    
                return response()->json($response, 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ], 500);
        }
    }

    private function reversal($imei, $dateString, $stan){ 
        $reqData = [
                'msg'   => [
                        'msg_id'   => $imei.$dateString,
                        'msg_ui'   => $imei,
                        'msg_si'   => 'R82561',
                        'msg_dt'   => $stan
                ]
        ];

	$url = env('REV_HOST_URI','NULL');
	Log::debug('DEBUG: starting reverse: '.json_encode($reqData));
        if ($url != 'NULL'){
                $responseCurl = Curl::to($url)
                        ->withData(json_encode($reqData))
                        ->enableDebug('/var/www/api/html/core/storage/logs/curl_log.txt')
			->withContentType('text/plain')
                        ->post();
		$responseObj = json_decode($responseCurl);
		Log::debug('DEBUG: response reversal: '.$responseCurl);
                if (isset($responseObj) && !is_null($responseObj)){
                        if (isset($responseObj->screen) && isset($responseObj->screen->title)){
                                $statusString = $responseObj->screen->title;
                                if (!is_null($statusString) && $statusString == 'Sukses'){
        			     //Log::info('Success reverse');
					Log::debug('DEBUG: success reverse');
	                             return 1;
         //                       	Log::info('Success Reverse');
				}
                        }else{
				Log::debug('DEBUG: failed to reverse, no secreen or title');
			}
                }
		else{
			Log::debug('DEBUG: failed to reverse, response not found');
		}

        }
	return 0;
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
        $data = $this->repository->with(['service.product.provider.category','transactionStatus','transactionPaymentStatus','merchant'])->find($id);
        
        if($data){
	    Log::debug('CHECHING DATA: '.json_encode($data));
            if($data->status == 0 || $data->status == 1){
                $reqData = new Request([
                    'tid'   => $data->code,
                    'nop'   => $data->merchant_no,
                    'voc'   => $data->service->product->code,
                ]);
                
                $response   = (new Core)->checkStatus($reqData);
		Log::debug('RESPONSE SPI: '.json_encode($response));
		if($response != null &&  $response['status'] == true){
                    if($response['data']->sts == 100){
                        $status = 0;
                    }elseif($response['data']->sts == 200){
                        $status = 2;
                    }elseif($response['data']->sts == 500){
                        $status = 1;
                    }else{
                        $status = 2;
                    }

                    $trx = Transaction::where('code', $response['data']->tid)->first();
                    if($trx){
                        $checkTS = TransactionStatus::where('transaction_id', $trx->id)
                                                    ->where('status',$status)
                                                    ->first();

                        if(!$checkTS){
                            $transactionStatus = new TransactionStatus;
                            $transactionStatus->transaction_id  = $trx->id;
                            $transactionStatus->status          = $status;
                            $transactionStatus->save();
                        }
                        
                        $data  = Transaction::find($trx->id);
                        if($status == 1){
                            $data->note = json_encode($response['data']);
                        }
                        $data->status = $status;
                        $data->save();

                        if($status == 2){
                            $merchant = Merchant::where('id', $data->merchant_id)->with('terminal')->first();
                            if($merchant){
				$date = date("YmdHis");
                        	$imei = $merchant->terminal->imei;
                	        $dateString = (string)$date;
        	                $stan = $data->stan;
                        
	                        if (is_null($data->is_reversed) || !$data->is_reversed 
                        	        || $data->is_reversed == 'null' 
                	                || $data->is_reversed == 0 || $data->is_reversed == '0'
        	                        || $data->is_reversed == 2 || $data->is_reversed == '2'){

	                                $reversalStatus = $this->reversal($imei, $dateString, $stan);
                                	if ($reversalStatus == 1){
                                	        $data->is_reversed = 1;
                        	                $data->save();
                	                }
        	                        else{
	                                        $data->is_reversed = 2;
                                        	$data->save();
                                	}
                        	}
                            }
                        }
                    }
                }
            }
           
            $data = $this->repository->with(['service.product.provider.category','transactionStatus','transactionPaymentStatus','merchant.terminal','merchant.user'])->find($id);
            if ($data->merchant->city != null && !is_array($data->merchant->city)){
                $city_text = $data->merchant->city;
                $data->merchant->city = ["id" => 0, "province_id" => 0, "name" => $city_text];    
            }
            
            $response = [
                'status'  => true,
                'message' => 'Success',
                'data'    => $data
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

    public function showWeb(Request $request, $id)
    {
        $data = $this->repository->with(['service.product.provider.category','transactionStatus','transactionPaymentStatus','merchant'])->find($id);

        if($data){

	    $tid = $data->merchant->terminal_id;
	    $trx_code = $data->code;

	    $msg_td = $request->header('msg-td', '000');
	    $msg_dt = $request->header('msg-dt', '000');
	    $api_key = $request->header('api-key', '000');

	    $dmsg_td = null;

	    $dmsg_td = base64_decode($msg_td,true);

    	    if (($msg_td == '000') || ($msg_dt == '000') || ($api_key == '000') || !isset($dmsg_td) || ($tid != $dmsg_td)){
		$response = [
	                'status'  => false,
        	        'message' => 'Invalid Data - 100',
//			'data'	  => $msg_td . '||' . $msg_dt . '||' . $api_key . '||' . $tid . '||' . $dmsg_td
            	];
            	return response()->json($response, 200);
	    }

	   $tbk = base64_encode($dmsg_td . $msg_dt);

	   $apkencrypter = new \Illuminate\Encryption\Encrypter( $tbk, 'AES-256-CBC' );
	   $decrypted_code = $apkencrypter->decrypt( $api_key );

	   if (($decrypted_code == null) || ($decrypted_code != $trx_code)){
		$response = [
                        'status'  => false,
                        'message' => 'Invalid Data - 101' 
                ];
                return response()->json($response, 200);

	   }

            Log::debug('CHECHING DATA: '.json_encode($data));
            if($data->status == 0 || $data->status == 1){
                $reqData = new Request([
                    'tid'   => $data->code,
                    'nop'   => $data->merchant_no,
                    'voc'   => $data->service->product->code,
                ]);

                $response   = (new Core)->checkStatus($reqData);
                Log::debug('RESPONSE SPI: '.json_encode($response));
                if($response != null &&  $response['status'] == true){
                    if($response['data']->sts == 100){
                        $status = 0;
                    }elseif($response['data']->sts == 200){
                        $status = 2;
                    }elseif($response['data']->sts == 500){
                        $status = 1;
                    }else{
                        $status = 2;
                    }

                    $trx = Transaction::where('code', $response['data']->tid)->first();
                    if($trx){
                        $checkTS = TransactionStatus::where('transaction_id', $trx->id)
                                                    ->where('status',$status)
                                                    ->first();

                        if(!$checkTS){
                            $transactionStatus = new TransactionStatus;
                            $transactionStatus->transaction_id  = $trx->id;
                            $transactionStatus->status          = $status;
                            $transactionStatus->save();
                        }

                        $data  = Transaction::find($trx->id);
                        if($status == 1){
                            $data->note = json_encode($response['data']);
                        }
                        $data->status = $status;
                        $data->save();

                        if($status == 2){
                            $merchant = Merchant::where('id', $data->merchant_id)->with('terminal')->first();
                            if($merchant){
                                $date = date("YmdHis");
                                $imei = $merchant->terminal->imei;
                                $dateString = (string)$date;

                                $stan = $data->stan;

                                if (is_null($data->is_reversed) || !$data->is_reversed 
                                        || $data->is_reversed == 'null' 
                                        || $data->is_reversed == 0 || $data->is_reversed == '0'
                                        || $data->is_reversed == 2 || $data->is_reversed == '2'){

                                        $reversalStatus = $this->reversal($imei, $dateString, $stan);
                                        if ($reversalStatus == 1){
                                                $data->is_reversed = 1;
                                                $data->save();
                                        }
                                        else{
                                                $data->is_reversed = 2;
                                                $data->save();
                                        }
                                }
                            }
                        }
                    }
                }
            }

            $data = $this->repository->with(['service.product.provider.category','transactionStatus','transactionPaymentStatus','merchant.terminal','merchant.user'])->find($id);
            if ($data->merchant->city != null && !is_array($data->merchant->city)){
                $city_text = $data->merchant->city;
                $data->merchant->city = ["id" => 0, "province_id" => 0, "name" => $city_text];    
            }

            $response = [
                'status'  => true,
                'message' => 'Success',
                'data'    => $data
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
     * @param  TransactionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TransactionUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $data = $this->repository->update($request->all(), $id);

            $response = [
                'status'  => true,
                'message' => 'Transaction updated.',
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
                    'message' => 'Transaction deleted.'
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
     * Rollback value from source ARDI.
     *
     * @param  int $transaction_id, $member_id, $amount
     *
     * @return \Illuminate\Http\Response
     */
    private function reversalArdi($transaction_id, $member_id, $amount)
    {
        $url = env('API_URL').'ardi-api/public/api/reversals';
        $reqData = [
            'transaction_id'    => $transaction_id,
            'member_id'         => $member_id,
            'amount'            => $amount,
            'date'              => date('Y-m-d H:i:s')
        ];
        $responseCurl = Curl::to($url)
                            ->withData($reqData)
                            ->post();
        
        $data = json_decode($responseCurl);
        return $data->status;
    }

    /**
     * Check Inqury to biller.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkInquiry(Request $request)
    {
        
//         $response = [
//             'status'  => false,
//             'message' => 'Layanan sedang dalam gangguan ke Provider. Silahkan coba lagi nanti.',
//             'data' => ['msg' => 'Layanan sedang dalam gangguan ke Provider. Silahkan coba lagi nanti']
//         ];
//
//         return response()->json($response, 404);
        
        if($request->has('bln')){
            $reqData = new Request([
                'cmd'   => $request->cmd,
                'nop'   => $request->nop,
                'bln'   => $request->bln
            ]);
        }elseif($request->has('voc')){
            $reqData = new Request([
                'cmd'   => $request->cmd,
                'nop'   => $request->nop,
                'voc'   => $request->voc
            ]);
        }elseif($request->has('vcr')){
            $reqData = new Request([
                'cmd'   => $request->cmd,
                'nop'   => $request->nop,
                'vcr'   => $request->vcr
            ]);
        }else{
            $reqData = new Request([
                'cmd'   => $request->cmd,
                'nop'   => $request->nop
            ]); 
        }
        
        $response = (new Core)->checkInquiry($reqData); // ini jika biller yang digunakan lebih dr 1
	//if ($request->cmd == 'INQPPOB'){
        //    dd($response);die();
       // }
        if($response['status'] == true){
            if(is_string($response['data']->msg)){
                $temp = $response['data']->msg;
                $response['data']->msg = (object) ["ket" => $temp ];
            }
        }
        return $response;
    }

    /**
     * Check status transaction from biller.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkStatus(Request $request)
    {
        $reqData = new Request([
            'tid'   => $request->transaction_code,
            'nop'   => $request->nop,
            'voc'   => $request->voc,
        ]);
        
        $response = (new Core)->checkStatus($reqData);

        if($response['status'] == true){
            if($response['data']->sts == 100){
                $status = 0;
            }elseif($response['data']->sts == 200){
                $status = 2;
            }elseif($response['data']->sts == 500){
                $status = 1;
            }else{
                $status = 2;
            }

            $trx = Transaction::where('code', $response['data']->tid)->first();
            if($trx){
                $checkTS = TransactionStatus::where('transaction_id', $trx->id)
                                            ->where('status',$status)
                                            ->first();

                if(!$checkTS){
                    $transactionStatus = new TransactionStatus;
                    $transactionStatus->transaction_id  = $trx->id;
                    $transactionStatus->status          = $status;
                    $transactionStatus->save();
                }
                
                $data  = Transaction::find($trx->id);
                if($status == 1){
                    $data->note = json_encode($response['data']);
                }
                $data->status = $status;
                $data->save();

                if($status == 2){
                    $merchant = Merchant::where('id', $data->merchant_id)->with('terminal')->first();
                    if($merchant){
			$date = date("YmdHis");
			$imei = $merchant->terminal->imei;
                        $dateString = (string)$date;
                        $stan = $data->stan;
			
                        if (is_null($data->is_reversed) || !$data->is_reversed 
                                || $data->is_reversed == 'null' 
                                || $data->is_reversed == 0 || $data->is_reversed == '0'
                                || $data->is_reversed == 2 || $data->is_reversed == '2'){

                                $reversalStatus = $this->reversal($imei, $dateString, $stan);
                                if ($reversalStatus == 1){
                                        $data->is_reversed = 1;
                                        $data->save();
                                }
                                else{
                                        $data->is_reversed = 2;
                                        $data->save();
                                }
                        }
                    }
                }
            }
        }

        return $response;
    }

    public function updateStatus(Request $request)
    {
        DB::beginTransaction();
        try {
            $transaction = Transaction::where('code', $request->pid)->with('service.product.provider.category','transactionStatus','transactionPaymentStatus','merchant')->first();
            $merchant = Merchant::where('id', $transaction->merchant_id)->with('terminal')->first();
	    $date = date("YmdHis");
	    Log::debug('Incoming callback');
            if($transaction){
                
                if(($request->code == 2)||($request->code == 3)){ // Gagal or Refund
                    $transaction->status = 2;
                    $transaction->save();

                    $transactionStatus = TransactionStatus::where('transaction_id',$transaction->id)
                                                        ->where('status',2)
                                                        ->first();
                    if(!$transactionStatus){
                        $transactionStatus = new TransactionStatus;
                        $transactionStatus->transaction_id  = $transaction->id;
                        $transactionStatus->status          = 2;
                        $transactionStatus->save();
		    }

                  	$imei = $merchant->terminal->imei;
                        $dateString = (string)$date;
                        $stan = $transaction->stan;

                        if (is_null($transaction->is_reversed) || !$transaction->is_reversed 
                                || $transaction->is_reversed == 'null' 
                                || $transaction->is_reversed == 0 || $transaction->is_reversed == '0'
                                || $transaction->is_reversed == 2 || $transaction->is_reversed == '2'){

                                $reversalStatus = $this->reversal($imei, $dateString, $stan);
                                if ($reversalStatus == 1){
                                        $transaction->is_reversed = 1;
                                        $transaction->save();
			        }
                                else{
                                     	$transaction->is_reversed = 2;
                                        $transaction->save();
                                }
                        }

                    // Get Ardi Transaction ID
                    //$url = env('API_URL').'ardi-api/public/api/transactions';
                    //$reqData = [
                    //    'ref_transactions_selada' => $transaction->id
                    //];
                    //$responseCurl = Curl::to($url)
                    //                    ->withData($reqData)
                    //                    ->get();
                    
                    //$dataResp = json_decode($responseCurl);
                    //
                    //if($dataResp->status == true && $dataResp->total_row == 1){
                    //    $transaction_id_ardi = $dataResp->data[0]->id;

                        // Reversal transaction of balance ARDI
                    //    $reversal = $this->reversalArdi($transaction_id_ardi, $transaction->merchant->no, $transaction->price);
                    //    if($reversal){
                            // Update Transaction Data
                    //        $transaction = Transaction::find($transaction->id);
                    //        $transaction->status = 2;
                    //        $transaction->note = json_encode($respData['data']);
                    //        $transaction->save();
                    //    }
                    //}

                    DB::commit();
                    return "OK";
                }elseif($request->code == 4){ // Sukses
                    $transaction->status = 1;
                    $transaction->save();

                    //Check if already exist
                    $transactionStatus = TransactionStatus::where('transaction_id',$transaction->id)
                                                        ->where('status',1)
                                                        ->first();
                    if(!$transactionStatus){
                        $transactionStatus = new TransactionStatus;
                        $transactionStatus->transaction_id  = $transaction->id;
                        $transactionStatus->status          = 1;
                        $transactionStatus->save();
                    }

                    DB::commit();
                    return "OK";
                }
            }else{
                
                return "OK";
            }
        } catch (Exception $e) {
            DB::rollBack();
            $transaction = Transaction::where('code', $request->pid)->with('service.product.provider.category','transactionStatus','transactionPaymentStatus','merchant')->first();
	    $transaction->is_reversed = 4;
            $transaction->save();
	    Log::debug('Exception at callback');
	    return "FAIL";
	} catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
	    Log::debug('Exception at callback, query');
            return "FAIL";
        }
    }

    public function summary(Request $request)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $data = Transaction::select('transactions.*','services.system_markup')
                            ->leftJoin('services','services.id','transactions.service_id')
                            ->where('transactions.status', 1);

        if($request->has('merchant_id')){
            $data = $data->where('transactions.merchant_id',$request->merchant_id);
        }

        if($request->has('start_date')){
            $data = $data->where('transactions.created_at','>=',$request->start_date);
        }

        if($request->has('end_date')){
            $data = $data->where('transactions.created_at','<=',$request->end_date);
        }

        $revenue        = $data->sum('price');
        $buffer         = $data->sum('system_markup');
        $billerPrice    = $data->sum('vendor_price');
        $profitAll      = $revenue - $buffer - $billerPrice;
        $profitBiller   = (60/100) * $profitAll;
        $profitBL       = (40/100) * $profitAll;
        $profitBLAll    = $profitBL + $buffer;
        $result = [
            'revenue'       => $revenue,
            'biller'        => $billerPrice,
            'profitAll'     => $profitAll,
            'profitBiller'  => $profitBiller,
            'profitBL'      => $profitBL,
            'buffer'        => $buffer,
            'profitBLAll'   => $profitBLAll
        ];        

        $response = [
            'status'    => true, 
            'message'   => 'Success',
            'data'      => $result,
        ];

        return response()->json($response, 200);
    }

    public function checkSettled(Request $request)
    {
        $check = Transaction::where('code', $request->transaction_code)
                            ->where('is_settled', 1)
                            ->first();

        if($check){
            $response = [
                'status'  => false,
                'message' => 'Transaction can not be settle'
            ];

            DB::commit();
            return response()->json($response, 403);
        }else{
            $response = [
                'status'  => true,
                'message' => 'Transaction can be settle'
            ];

            DB::commit();
            return response()->json($response, 200);
        }
    }

    public function settlement(TransactionUpdateRequest $request)
    {
        DB::beginTransaction();
        try {
            
            //If you guys settlement everyday
            // $checkNumber = Transaction::whereDate('created_at', Carbon::now())
            //                         ->where('status', 1)
            //                         ->max('settle_number');

            // If you guys so lazy for doing settlement use this code
            if($request->has('merchant_id')){
                $checkNumber = Transaction::where('status', 1)
                                            ->where('merchant_id',$request->merchant_id)
                                            ->max('settle_number');
            }else{
                $checkNumber = Transaction::where('status', 1)
                                ->max('settle_number');
            }

            $data = [
                'is_settled'    => 1,
                'settle_number' => $checkNumber + 1,
                'settled_at'    => Carbon::now(),
            ];
            
            //If you guys settlement everyday
            // $settled = Transaction::whereDate('created_at', Carbon::now())
            //                     ->where('status', 1)
            //                     ->where('is_settled', 0)
            //                     ->update($data);

            // If you guys so lazy for doing settlement use this code
            if($request->has('merchant_id')){
                $settled = Transaction::where('status', 1)
                                        ->where('is_settled', 0)
                                        ->where('merchant_id',$request->merchant_id)
                                        ->update($data);
            }else{
                $settled = Transaction::where('status', 1)
                                ->where('is_settled', 0)
                                ->update($data);
            }
            
            if($settled){
                $response = [
                    'status'  => true,
                    'message' => 'Transaction settlement success.'
                ];
    
                DB::commit();
                return response()->json($response, 200);
            }else{
                $response = [
                    'status'  => false,
                    'message' => 'Transaction settlement failed or no one transaction can be settled.'
                ];
    
                DB::commit();
                return response()->json($response, 500);
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

    public function reversalBJB(Request $request){

    }
}
