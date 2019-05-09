<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;
use JWTAuthException;
use Auth;

class UserApiController extends Controller
{
    public function UserLogin(Request $request)
    {
       try {
        $result = [];
           $token = null;

        if($request->email !== null && $request->password !== null ){
            if(!$token = JWTAuth::attempt(['email' => $request->email , 'password' => $request->password])) {
                $result = [
                'token' => null,
                'statusCode' => 200,
                'msg' =>  "Username or Password is not correct",
                'status' => false
                ];
                return $result;
            
            }
            else{
                $result = [
                'token' => $token,
                'statusCode' => 200,
                'msg' =>  "Username or Password is correct",
                'status' => true
                ];

                // return $this->statusCode(200)->setDataBag($result)->respond(true, "username and password correct");
                return $result;
            }

        } else {
             $result = [
                'token' => $token,
                'statusCode' => 200,
                'msg' =>  "enter email and password",
                'status' => true
                ];
                return $result;
        }
       } catch (Exception $e) {
           dd($e);
       }
    }
    
}
