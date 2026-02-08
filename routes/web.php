<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AlertaController;
use App\Http\Controllers\MonitorizacaoController;




Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/alertas', [AlertaController::class, 'index'])->name('alertas.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


Route::post('/alertas/{alerta}/marcar-lido', [AlertaController::class, 'marcarLido'])->name('alertas.marcar-lido');
Route::get('/alertas/count', [AlertaController::class, 'countNaoLidos'])->name('alertas.count');
    
});






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
    Route::get('/monitorizacao/consumo-dispositivos', [MonitorizacaoController::class, 'consumoPorDispositivo'])
    ->middleware('auth');

    
    Route::delete('/alertas/{alerta}', [AlertaController::class, 'destroy'])->name('alertas.destroy');
    // Ação rápida de ligar/desligar (via AJAX)
    Route::post('devices/{dispositivo}/toggle', [DeviceController::class, 'toggle'])
        ->name('devices.toggle');
});


/* alerta */

Route::get('/gerar-consumos-teste', [DeviceController::class, 'gerarConsumosTeste'])
    ->middleware('auth');





    use Illuminate\Support\Facades\Password;

// Rotas de recuperação de senha
Route::get('/forgot-password', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');


Route::post('/reset-password', [App\Http\Controllers\Auth\NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');


    Route::get('/monitorizacao/stats', [MonitorizacaoController::class, 'stats'])
    ->middleware('auth');
