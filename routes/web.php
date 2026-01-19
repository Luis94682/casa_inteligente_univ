<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;

// Páginas públicas
Route::get('/', [MainController::class, 'index'])->name('index');

// Autenticação
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logindata', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard protegido (exemplo básico)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Área admin (já tens)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // Aqui podes adicionar mais rotas admin no futuro
});





/* link view */


Route::get('/alert', function () {
    return view('viewDash.alert');
})->middleware('auth')->name('alert');

Route::get('/dispositivo', function () {
    return view('viewDash.dispositivo');
})->middleware('auth')->name('dispositivo');

Route::get('/recomendacoes', function () {
    return view('viewDash.recomendacoes');
})->middleware('auth')->name('recomendacoes');