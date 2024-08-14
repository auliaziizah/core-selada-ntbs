<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use App\Entities\User;
use Crypt;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param)
    {
	

        $user = new User;
        $pass = $user->can_access($param);
        
        if($pass){
            return $next($request);
        }else{
            $response = [
                'status'    => false, 
                'message'   => 'You do not have permission',
                'code'      => 403
            ];

            return response()->json($response,403);
        }
    } 
}
