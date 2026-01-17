<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }


    /* public function validacao(Request $request){

        $request->validate([
            'senha_camp'=>'required',
            'email_camp'=>'required'
        ]);

        $senha=$request->input('senha_camp');
        $email=$request->input('email_camp');

        echo "ok";
    } */

        public function store(Request $request){
            $user = User::create([
                'name' => $request->name ?? explode('@', $request->email)[0],
                'email' => $request->email,
                'telefone' => $request->telefone,
                'password' => Hash::make($request->password),
            ]);

            // ... após User::create(...)

return redirect()->route('login')
    ->with('success', 'Conta criada com sucesso! Agora podes fazer login.');
        }

   
}
