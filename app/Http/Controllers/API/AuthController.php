<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Validator;
use Auth;
use File;

use App\Notifications\SendOTP;
use App\User;
use App\PasswordReset;
use App\Advertisement;

class AuthController extends Controller
{
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function index(Request $request){ 
        $validator = Validator::make($request->all(), [ 
            'first_name'        => 'required', 
            'last_name'         => 'required', 
            'email' => 'required|email|unique:'.with(new User)->getTable().',email',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) { 
            return response()->json(['message'=>$validator->errors()->first()]);            
        }
        $input = array_map('trim', $request->all());
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input); 
        if($user){
            $user->assignRole(config('constants.ROLE_TYPE_USER_ID'));
            $response['status'] = true; 
            $response['message'] = "You has been successfully registered, please login with your email and password.";
            return response()->json($response);
        }else{
            return response()->json(['message'=>'Something wrong in registration.']);
        }
    }

   
    
}
