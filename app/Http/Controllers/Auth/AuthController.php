<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }


    public function validacao(Request $request){

        $request->validate([
            'senha_camp'=>'required',
            'email_camp'=>'required'
        ]);

        $senha=$request->input('senha_camp');
        $email=$request->input('email_camp');

        echo "ok";
    }

   
}
