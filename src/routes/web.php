<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\User\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
Route::get('/thanks', [RegisteredUserController::class, 'complete'])->name('thanks');
Route::get('/login', [UserLoginController::class, 'index'])->name('login');


Route::get('/done', [ReservationController::class, 'complete'])->name('done');
