<?php

namespace App\Http\Middleware;
use JWTAuth;
use Closure;
use Illuminate\Contracts\Auth\Guard;  
use Response;  
use Config;

class csrfValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//	return Response::json(array('error'=>'Server Maintenance'));
	
//	$newEncrypter = new \Illuminate\Encryption\Encrypter( 'WP17291Q00000532', 'AES-256-CBC' );
//	$decrypted = $newEncrypter->decrypt( $encrypted );
//	dd($decrypted);die();

//	$user = JWTAuth::parseToken()->authenticate();
//        $userId = $user->id;
//	$sn = Merchant
//dd($userId);die();

//	$srkey = $request->header('user-key-gen');
//	$dcdUKey = base64_decode($srkey);
//	dd($dcdUKey);die();
//	if(isset($dcdUKey)){  
//            return Response::json(array('user-key'=>$dcdUKey));  
//        }
//	else{
//		return Response::json(array('error'=>'Security Violation'));
	//}
	//return Response::json(array('error'=>'Server Maintenance'));
        return $next($request);
    }
}
