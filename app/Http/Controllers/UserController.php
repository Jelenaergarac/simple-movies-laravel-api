<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $token = Auth::login($user);
        return response()->json([
            'token'=>$token,
            'user'=>$user,
            'message'=>'Registration was successfull!'
        ]);

    }
    public function login(Request $request){

        $credentials = $request->only(['email', 'password']);
        $token = Auth::attempt($credentials);
        if(!$token){
            return response()->json([
                'message'=>'Invalid credentials'
            ],401);
        }
        return response()->json([
            'token'=>$token,
            'user'=>Auth::user(),
            'message'=>'You logged in successfully!'
            
        ]);

    }
    public function logout(){
        Auth::logout();
        return response()->noContent();
    }
    public function refreshToken(){
        try{
            $token = Auth::refresh();
            return response()->json([
                'token'=>$token
            ]);

        }catch(TokenBlacklistedException $exception){
 
            return response()->json([
                'message'=>'Invalid Token'
            ],401);
        }

    }
    public function getProfile(){

        $user = Auth::user();
        return response()->json($user);
    }
}
