<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            // Redireciona para login ou página de erro
            return redirect()->route('login')
                ->with('error', 'Acesso restrito a administradores.');
        }

        return $next($request);
    }


}