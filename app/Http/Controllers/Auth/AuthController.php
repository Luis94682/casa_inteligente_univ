<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'telefone' => 'nullable|string|max:9',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'telefone' => $validated['telefone'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')
            ->with('success', 'Conta criada com sucesso! Agora podes fazer login.');
    }

    // Novo método para processar o login
    public function authenticate(Request $request)
    {
        $request->validate([
            'email_camp'   => 'required|email',
            'senha_camp'   => 'required',
        ]);

        // Tenta autenticar com os nomes dos campos do teu form
        if (Auth::attempt([
            'email'    => $request->email_camp,
            'password' => $request->senha_camp,
        ])) {
            $request->session()->regenerate();

            // Redireciona para dashboard (ou index, o que preferires)
            return redirect()->intended(route('dashboard'))
                ->with('success', 'Bem-vindo de volta, ' . Auth::user()->name . '!');
        }

        // Se falhar → volta ao login com erro
        return back()
            ->withInput($request->only('email_camp'))
            ->with('error', 'Email ou senha incorretos. Tenta novamente.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Sessão terminada com sucesso.');
    }
}