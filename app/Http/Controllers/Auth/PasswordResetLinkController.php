<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        return view('auth.passwords.email');
    }

/*     public function store(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    if ($status === Password::RESET_LINK_SENT) {
        return response()->json([
            'success' => true,
            'status' => __($status)
        ]);
    }

    return response()->json([
        'success' => false,
        'errors' => ['email' => [__($status)]]
    ], 422);
} */


    public function store(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    // Mostra todos os emails enviados nesta requisição
    dd(Mail::getSymfonySentMessages());

    return $status === Password::RESET_LINK_SENT
        ? response()->json(['status' => __($status)])
        : response()->json(['errors' => ['email' => [__($status)]]], 422);
}
}