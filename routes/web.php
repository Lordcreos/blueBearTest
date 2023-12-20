<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/email/verify/{user}', [AuthController::class, 'emailVerify'])->name('email_verify');

Route::get('/', [IndexController::class, 'show'])->name('index')->middleware('auth');

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('api_login');
    Route::post('/register', [AuthController::class, 'register'])->name('api_register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('api_logout');
});

Route::get('/{any?}', [AuthController::class, 'error'])->name('error');
