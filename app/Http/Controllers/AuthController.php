<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Arr;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetRequest;

class AuthController extends Controller
{
    function __construct(User $Model){
        $this->model=$Model;
    }

    public function Login(LoginRequest $kredensial)
    {
        $failed=[
            'success'=>'403!',
            'message'=>'login failed!'
            ]; 
        //jika gagal maka?
        if(!Auth::attempt($kredensial)){
            return response()->json($failed, 403);
        }
            $user=Auth::user();
            $success=[
                'success'=>'200!',
                'message'=>'login successfully',
                'token'=>$user->createToken('login')->accessToken,
                'type'=>'Bearer'
            ];
            return response()->json($success,200); 
    }

    public function Register(RegisterRequest $data)
    {
        $data['password']=Hash::make($data['password']);
        $created=$this->model->create($data);
        return ['message'=>'registered successfully'];
    }

    public function Reset(ResetRequest $data)
    {
        $resetRequired=$this->model::where('email',$data['email']);
    }

    public function Logout()
    {
        Auth::user()->token()->revoke();
        $data=[
            'success'=>'200!',
            'message'=>'logout successfully'
        ];
        return response()->json($data, 200);
    }
}