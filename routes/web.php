<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [SessionController::class, 'signIn'])->name('login');
    Route::post('/sign-in-action', [SessionController::class, 'signInAction'])->name('sign.in.action');
    
    Route::get('/sign-up', [SessionController::class, 'signUp']);
    Route::post('/sign-up-action', [SessionController::class, 'signUpAction'])->name('sign.up.action');
    
    Route::post('/logout-action', [SessionController::class, 'logoutAction'])->name('logout.action');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    
    Route::get('/profil', [ProfileController::class, 'index']);
});

