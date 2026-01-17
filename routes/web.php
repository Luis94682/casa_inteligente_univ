<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


/* auth */

Route::get('/',[MainController::class,'index'])->name('index');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/logindata',[AuthController::class,'validacao']);
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'store'])->name('register.store');
