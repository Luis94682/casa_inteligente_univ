<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AlertaController;

// Páginas públicas
Route::get('/', [MainController::class, 'index'])->name('index');

// Autenticação
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logindata', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard protegido (exemplo básico)
Route::get('/alertas', [AlertaController::class, 'index'])->name('alertas.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Alertas
Route::post('/alertas/{alerta}/marcar-lido', [AlertaController::class, 'marcarLido'])->name('alertas.marcar-lido');
Route::get('/alertas/count', [AlertaController::class, 'countNaoLidos'])->name('alertas.count');
    
});





/* link view */


/* Route::get('/alert', function () {
    return view('viewDash.alert');
})->middleware('auth')->name('alert'); */

Route::get('/dispositivo',[DeviceController::class, 'index'])->middleware('auth')->name('dispositivo');
Route::get('/monitoramento', [DeviceController::class, 'monitoramento'])->middleware('auth')->name('monitoramento');


Route::get('/relatorio', function () {
    return view('viewDash.relatorio');
})->middleware('auth')->name('relatorio');

Route::get('/historico', function () {
    return view('viewDash.historico');
})->middleware('auth')->name('historico');


/*  */


Route::middleware('auth')->group(function () {
    Route::resource('devices', DeviceController::class);
    
    // Ação rápida de ligar/desligar (via AJAX)
    Route::post('devices/{dispositivo}/toggle', [DeviceController::class, 'toggle'])
        ->name('devices.toggle');
});


/* alerta */

