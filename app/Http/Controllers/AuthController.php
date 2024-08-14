<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use DateInterval;
use DatePeriod;
use Validator, Hash;
use JWTAuth;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;
use App\Http\Requests;
use Tymon\JWTAuth\Exceptions\JWTException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Ixudra\Curl\Facades\Curl;

use App\Entities\User;

/**
 * Class AuthController.
 *
 * @package namespace App\Http\Controllers;
 */
class AuthController extends Controller
{
    public function index() {
        return view('welcome');
    }    

    public function register(Request $request)
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
            
            $user = User::create([
                            'role_id'   => $request->role_id,
                            'username'  => $request->username,
                            'fullname'  => $request->fullname,
                            'email'     => $request->email,
                            'password'  => bcrypt($request->password),
                        ]);
                        
            DB::commit();
            return response()->json([
                'status'    => true, 
                'message'   => 'Thanks for signing up.',
                'data'      => $user
            ], 200);
        } catch (Exception $e) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'=> false, 
                'error'=> 'Something wrong!'
            ], 500);
        } catch (\Illuminate\Database\QueryException $ex) {
            // For rollback data if one data is error
            DB::rollBack();

            return response()->json([
                'status'=> false, 
                'error'=> 'Something wrong!'
            ], 500);
        }
    }

    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['status'=> false, 'error'=> $validator->messages()], 401);
        }
        
        try {
            
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information. Or Try Again'], 404);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['status' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        
        // all good so return the token
        $user = User::where('username', $credentials['username'])->with('user_group.group','merchant.terminal')->first();
        
		if($user){
			$result = array();
			$result['status']   = true;
			$result['message']  = 'Success';
			$result['token']    = $token;
			$result['data']     = $user;
			// all good so return the token
            return response()->json($result,200);
        }
    }

    /**
     * Change Password.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::where('id',$request->user_id)->first();
            if($user){
                if (Hash::check($request->old_password, $user->password))
                {
                    $user->password = bcrypt($request->new_password);
                    $user->save();
                    // ];
                    DB::commit();
                        $response = [
                            'status'    => true,
                            'message'     => 'Success',
                        ];
                    return response()->json($response, 200);            
                }else{
                    DB::rollBack();

                    $response = [
                        'status'    => false,
                        'error'     => 'Wrong password, please fill correct old password for change new password!',
                    ];
            
                    return response()->json($response, 400);
                }
            }else{
                DB::rollBack();

                $response = [
                    'status'    => false,
                    'error'     => 'User not found.',
                ];
        
                return response()->json($response, 404);
            }
        } catch (Exception $e) {
            // For rollback data if one data is error
            DB::rollBack();

            $response = [
                'status'    => false,
                'error'     => 'Something error',
                'exception' => $e
            ];
    
            return response()->json($response, 500);
        } catch (\Illuminate\Database\QueryException $e) {
            // For rollback data if one data is error
            DB::rollBack();

            $response = [
                'status'    => false,
                'error'     => 'Something error',
                'exception' => $e
            ];
    
            return response()->json($response, 500);
        }
    }
    public function logout(Request $request)
    {
        try {
            $token = $request->bearerToken();
            JWTAuth::invalidate($token);

            return response()->json(['status' => true, 'message' => 'Logout successful'], 200);
        } catch (JWTException $e) {
            return response()->json(['status' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }
}
