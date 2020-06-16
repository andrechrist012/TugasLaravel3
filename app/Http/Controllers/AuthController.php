<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('Laravel Token');
                return response()->json([
                    'message'=>'login success',
                    'token'=>$token->accessToken
                ]);
            }else{
                return response()->json([
                    'message'=>'passowrd not matches'
                ]);
            }
        }else{
            return response()->json([
                'message'=>'email not found'
            ]);
        }
    }

    public function register(Request $request){
        $user = User::create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'email'=>$request->email
        ]);
        $token = $user->createToken('Laravel Token');
        return response()->json([
            'message'=>'register success',
            'token'=>$token->accessToken
        ]);
    }
}
