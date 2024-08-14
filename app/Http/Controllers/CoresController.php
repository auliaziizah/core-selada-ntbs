<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use DateTime;
use DateInterval;
use DatePeriod;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Crypt;

use App\Entities\Transaction;
use App\Entities\Biller;
use App\Entities\Service;
use App\Entities\BillerDetail;

/**
 * Class CoresController.
 *
 * @package namespace App\Http\Controllers;
 */
class CoresController extends Controller
{
    public function dashboard(Request $request)
    {
        DB::beginTransaction();
        try {

            if($request->type == 1){
                $omzetTrans  = [];
                $saleTrans  = [];
                for($i=6;$i>=0;$i--){
                    if($i == 0){
                        $day = date("Y-m-d");
                    }else{
                        $day = date("Y-m-d", strtotime('-'.$i.' days') );
                    }

                    $total = Transaction::select('*')
                                        ->leftJoin('transaction_statuses','transaction_statuses.transaction_id','transactions.id')
                                        ->where('transaction_statuses.status',1)
                                        ->whereDate('transaction_statuses.created_at', $day )
                                        ->count();

                    $amount = Transaction::select('*')
                                        ->leftJoin('transaction_statuses','transaction_statuses.transaction_id','transactions.id')
                                        ->where('transaction_statuses.status',1)
                                        ->whereDate('transaction_statuses.created_at', $day )
                                        ->sum('price');

                    array_push($omzetTrans, $day.' ('.$total.')');
                    array_push($saleTrans, $day.' ('.$amount.')');
                }
            }elseif($request->type == 2){
                $weekNow    = date("W");
                $yearNow    = date("Y");
                $omzetTrans = [];
                $saleTrans = [];
                for($i=3;$i>=0;$i--){
                    if($i == 0){
                        $weekNumber = date("W");
                    }else{
                        $weekNumber = date("W", strtotime('-'.$i.' weeks') );
                    }
                    if($weekNumber > $weekNow){
                        $year = $yearNow - 1;
                    }else{
                        $year = $yearNow;
                    }

                    $total  = Transaction::select('*')
                                            ->leftJoin('transaction_statuses','transaction_statuses.transaction_id','transactions.id')
                                            ->where('transaction_statuses.status',1)
                                            ->whereBetween('transaction_statuses.created_at', [
                                                Carbon::now()->setISODate($year,$weekNumber)->startOfWeek(),
                                                Carbon::now()->setISODate($year,$weekNumber)->endOfWeek(),
                                            ])
                                            ->count();

                    $amount  = Transaction::select('*')
                                            ->leftJoin('transaction_statuses','transaction_statuses.transaction_id','transactions.id')
                                            ->where('transaction_statuses.status',1)
                                            ->whereBetween('transaction_statuses.created_at', [
                                                Carbon::now()->setISODate($year,$weekNumber)->startOfWeek(),
                                                Carbon::now()->setISODate($year,$weekNumber)->endOfWeek(),
                                            ])
                                            ->sum('price');
                    
                    array_push($omzetTrans, Carbon::now()->setISODate($year,$weekNumber)->startOfWeek()->format('Y/m/d').' - '.Carbon::now()->setISODate($year,$weekNumber)->endOfWeek()->format('Y/m/d').' ('.$total.')');
                    array_push($saleTrans, Carbon::now()->setISODate($year,$weekNumber)->startOfWeek()->format('Y/m/d').' - '.Carbon::now()->setISODate($year,$weekNumber)->endOfWeek()->format('Y/m/d').' ('.$amount.')');
                }
            }elseif($request->type == 3){
                $month          = date("m");
                $year           = date("Y");
                $omzetTrans    = [];
                $saleTrans    = [];
                for($i=1;$i<=$month;$i++){
                    $dateObj   = DateTime::createFromFormat('!m', $i);
                    $monthName = $dateObj->format('F');
                    
                    $total = Transaction::select('*')
                                        ->leftJoin('transaction_statuses','transaction_statuses.transaction_id','transactions.id')
                                        ->where('transaction_statuses.status',1)
                                        ->whereMonth('transaction_statuses.created_at', $i)
                                        ->whereYear('transaction_statuses.created_at', $year)
                                        ->count();

                    $amount = Transaction::select('*')
                                        ->leftJoin('transaction_statuses','transaction_statuses.transaction_id','transactions.id')
                                        ->where('transaction_statuses.status',1)
                                        ->whereMonth('transaction_statuses.created_at', $i)
                                        ->whereYear('transaction_statuses.created_at', $year)
                                        ->sum('price');
                    
                    array_push($omzetTrans, $monthName.' ('.$total.')');
                    array_push($saleTrans, $monthName.' ('.$amount.')');
                }
            }elseif($request->type == 4){
                $begin = new DateTime($request->get('start_date'));
                if($request->get('end_date') === 'NaN-NaN-NaN'){
                    $end = new DateTime(date("Y-m-d 23:59:59"));
                }else{
                    $end_date = $request->get('end_date')." 23:59:59";
                    $end = new DateTime(date($end_date));
                }

                $interval       = DateInterval::createFromDateString('1 day');
                $period         = new DatePeriod($begin, $interval, $end);
                $omzetTrans   = [];
                $saleTrans   = [];
                foreach($period as $key => $dt){
                    $total = Transaction::select('*')
                                        ->leftJoin('transaction_statuses','transaction_statuses.transaction_id','transactions.id')
                                        ->where('transaction_statuses.status',1)
                                        ->whereDate('transaction_statuses.created_at', $dt->format('Y-m-d H:i:s'))
                                        ->count();

                    $amount = Transaction::select('*')
                                        ->leftJoin('transaction_statuses','transaction_statuses.transaction_id','transactions.id')
                                        ->where('transaction_statuses.status',1)
                                        ->whereDate('transaction_statuses.created_at', $dt->format('Y-m-d H:i:s'))
                                        ->sum('price');
                    
                    array_push($omzetTrans, $dt->format('d M Y').' ('.$total.')');
                    array_push($saleTrans, $dt->format('d M Y').' ('.$amount.')');
                }
            }else{
                $response = [
                    'status'  => false,
                    'message' => 'Type must be filled',
                ];
                return response()->json($response, 500);
            }

            $begin = new DateTime($request->get('start_date'));
            if($request->get('end_date') === 'NaN-NaN-NaN'){
                $end = new DateTime(date("Y-m-d 23:59:59"));
            }else{
                $end_date = $request->get('end_date')." 23:59:59";
                $end = new DateTime(date($end_date));
            }

            $transProduct = Transaction::selectRaw('
                                                count(service_id) as total,
                                                transactions.service_id
                                            ')
                                            ->leftJoin('transaction_statuses','transaction_statuses.transaction_id','transactions.id')
                                            ->where('transaction_statuses.status',1)
                                            ->whereBetween('transaction_statuses.created_at', [$begin,$end])
                                            ->groupBy('transactions.service_id')
                                            ->orderBy('total','DESC')
                                            ->with('service.product')
                                            ->get();

            $transAll       = Transaction::select('*')
                                        ->whereBetween('created_at', [$begin,$end])
                                        ->count();

            $transPending   = Transaction::select('*')
                                        ->where('status',0)
                                        ->whereBetween('created_at', [$begin,$end])
                                        ->count();
            
            $transSuccess   = Transaction::select('*')
                                        ->where('status',1)
                                        ->whereBetween('created_at', [$begin,$end])
                                        ->count();

            $transFailed    = Transaction::select('*')
                                        ->where('status',2)
                                        ->whereBetween('created_at', [$begin,$end])
                                        ->count();

            $result = [
                'omzetTrans'   => $omzetTrans,
                'saleTrans'    => $saleTrans,
                'transProduct' => $transProduct,
                'transAll'     => $transAll,
                'transPending' => $transPending,
                'transSuccess' => $transSuccess,
                'transFailed'  => $transFailed
            ];
            
            $response = [
                'status'  => true,
                'message' => 'Success',
                'data'    => $result,
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

    public function checkBalance(Request $request)
    {
        DB::beginTransaction();
        try {
            $biller = Biller::where('code','SPI')->first();
            if($biller){
                $sig = md5($biller->id.$biller->password);
                
                $reqData = [
                    'cmd'       => 'CEKSALDO',
                    'tid'       => $biller->id,
                    'uid'       => $biller->username,
                    'sig'       => $sig,
                ];

                $data = BillerDetail::where('biller_id',$biller->id)
                                    ->where('code','CEKSALDO')
                                    ->first();

                if($data){
                    $responseCurl = Curl::to($data->url)
                                        ->withData($reqData)
                                        ->asJson()
                                        ->post();

                    if($responseCurl){

                        $biller->balance = $responseCurl->sal;
                        $biller->save();
                        
                        $response = [
                            'status' => true,
                            'data'   => $responseCurl
                        ];

                        DB::commit();
                        return response()->json($response, 200);
                    }else{
                        $response = [
                            'status'  => false,
                            'error'   => 'Request to server failed'
                        ];
            
                        DB::rollBack();
                        return response()->json($response, 500);
                    }
                }else{
                    $response = [
                        'status'  => false,
                        'error'   => 'Biller Detail not found'
                    ];
        
                    DB::rollBack();
                    return response()->json($response, 404);
                }
            }else{
                $response = [
                    'status'  => false,
                    'error'   => 'Biller not found'
                ];
    
                DB::rollBack();
                return response()->json($response, 404);
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

    public function transaction(Request $request)
    {
        DB::beginTransaction();
        try {
            $biller = Biller::where('code','SPI')->first();
            if($biller){
                $nop = strrev($request->nop);
                $sig = md5($request->tid . $nop . $biller->password);
                
                $data = BillerDetail::where('biller_id',$biller->id)
                                    ->where('code',$request->cmd)
                                    ->first();

                if($data){
                    $reqData = [
                        'cmd'   => $request->cmd,
                        'tid'   => $request->tid,
                        'nop'   => $request->nop,
                        'voc'   => $request->voc,
                        'uid'   => $biller->username,
                        'sig'   => $sig,
                    ];

		    if ($request->has('vcr')){
			
		    	$reqData = [
                        'cmd'   => $request->cmd,
                        'tid'   => $request->tid,
                        'nop'   => $request->nop,
                        'vcr'   => $request->vcr,
                        'uid'   => $biller->username,
                        'sig'   => $sig,
                    ];

		    }

                    $responseCurl = Curl::to($data->url)
                                        ->withData($reqData)
                                        ->asJson()
                                        ->post();

                    if($responseCurl){
                        if($responseCurl->sts == 100){ // Pending
                            $response = [
                                'status'    => true,
                                'code'      => 0,
                                'message'   => $responseCurl->msg,
                                'data'      => json_encode($responseCurl)
                            ];
                        }elseif($responseCurl->sts == 500){ // Success
                            $response = [
                                'status'    => true,
                                'code'      => 1,
                                'message'   => $responseCurl->msg,
                                'data'      => json_encode($responseCurl)
                            ];
                        }elseif($responseCurl->sts == 200){ // Fail
                            $response = [
                                'status'    => false,
                                'code'      => 2,
                                'message'   => $responseCurl->msg,
                                'data'      => json_encode($responseCurl)
                            ];
                        }else{
                            $response = [
                                'status'    => false,
                                'code'      => 3,
                                'message'   => $responseCurl->msg,
                                'data'      => json_encode($responseCurl)
                            ];
                        }

                        DB::commit();
                        return $response;
                    }else{
                        $response = [
                            'status'  => false,
                            'error'   => 'Request to server failed'
                        ];
            
                        DB::rollBack();
                        return $response;
                    }
                }else{
                    $response = [
                        'status'  => false,
                        'error'   => 'Biller Detail not found'
                    ];
        
                    DB::rollBack();
                    return $response;
                }
            }else{
                $response = [
                    'status'  => false,
                    'error'   => 'Biller not found'
                ];
    
                DB::rollBack();
                return $response;
            }
        } catch (Exception $e) {
            $response = [
                'status'  => false,
                'error'   => $e
            ];

            DB::rollBack();
            return $response;
        } catch (\Illuminate\Database\QueryException $e) {
            $response = [
                'status'  => false,
                'error'   => $e
            ];

            DB::rollBack();
            return $response;
        }
    }

    public function checkInquiry(Request $request)
    {
        DB::beginTransaction();
        try {
            $biller = Biller::where('code','SPI')->first();
            if($biller){
                $nop = strrev($request->nop);
                $sig = md5($request->tid . $nop . $biller->password);

                $reqData = [
                    'cmd'   => $request->cmd,
                    'tid'   => $biller->id,
                    'uid'   => $biller->username,
                    'nop'   => $request->nop,
                    'adm'   => 0,
                    'sig'   => $sig,
                ];

                if($request->has('bln')){
                    $reqData['bln'] = $request->bln;
                }elseif($request->has('voc')){
                    $reqData['voc'] = $request->voc;
                }elseif($request->has('vcr')){
                    $reqData['vcr'] = $request->vcr;
                }
                
                
                $data = BillerDetail::where('biller_id',$biller->id)
                                    ->where('code',$request->cmd)
                                    ->first();
                                    
                if($data){
                    $responseCurl = Curl::to($data->url)
                                        ->withData($reqData)
                                        ->asJson()
                                        ->post();

                    if($responseCurl){
                        
                        $response = [
                            'status' => true,
                            'data'   => $responseCurl
                        ];

                        DB::commit();
                        return $response;
                    }else{
                        $response = [
                            'status'  => false,
                            'error'   => 'Request to server failed'
                        ];
            
                        DB::rollBack();
                        return $response;
                    }
                }else{
                    $response = [
                        'status'  => false,
                        'error'   => 'Biller Detail not found'
                    ];
        
                    DB::rollBack();
                    return $response;
                }
            }else{
                $response = [
                    'status'  => false,
                    'error'   => 'Biller not found'
                ];
    
                DB::rollBack();
                return $response;
            }
        } catch (Exception $e) {
            // For rollback data if one data is error
            DB::rollBack();

            $response = [
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ];

            return $response;
        } catch (\Illuminate\Database\QueryException $e) {
            // For rollback data if one data is error
            DB::rollBack();

            $response = [
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ];
            
            return $response;
        }
    }

    public function checkStatus(Request $request)
    {
        try {
            $biller = Biller::where('code','SPI')->first();
            if($biller){
                $nop = strrev($request->nop);
                $sig = md5($request->tid . $nop . $biller->password);

                $reqData = [
                    'cmd'   => 'CEKSTATUS',
                    'tid'   => $request->tid,
                    'uid'   => $biller->username,
                    'nop'   => $request->nop,
                    'voc'   => $request->voc,
                    'sig'   => $sig,
                ];

                $data = BillerDetail::where('biller_id',$biller->id)
                                    ->where('code','CEKSTATUS')
                                    ->first();

                if($data){
                    $responseCurl = Curl::to($data->url)
                                        ->withData($reqData)
                                        ->asJson()
                                        ->post();

                    if($responseCurl){
                        $response = [
                            'status' => true,
                            'data'   => $responseCurl
                        ];

                        return $response;
                    }else{
                        $response = [
                            'status'  => false,
                            'error'   => 'Request to server failed'
                        ];
            
                        return $response;
                    }
                }else{
                    $response = [
                        'status'  => false,
                        'error'   => 'Biller Detail not found'
                    ];
        
                    return $response;
                }
            }else{
                $response = [
                    'status'  => false,
                    'error'   => 'Biller not found'
                ];
    
                return $response;
            }
        } catch (Exception $e) {
            // For rollback data if one data is error

            $response = [
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ];
            
            return $response;
        } catch (\Illuminate\Database\QueryException $e) {
            // For rollback data if one data is error

            $response = [
                'status'    => false, 
                'error'     => 'Something wrong!',
                'exception' => $e
            ];
            
            return $response;
        }
    }
}
