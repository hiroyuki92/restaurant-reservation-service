<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\User\ReservationController;
use App\Http\Controllers\User\MyPageController;
use App\Http\Controllers\ShopController;
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
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/thanks', [RegisteredUserController::class, 'complete'])->name('thanks');
Route::get('/login', [UserLoginController::class, 'index']);
Route::post('/login', [UserLoginController::class, 'login'])->name('login');
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');


Route::get('/done', [ReservationController::class, 'complete'])->name('done');
Route::get('/', [ShopController::class, 'index'])->name('shop');
Route::get('/detail', [ShopController::class, 'detail'])->name('detail');
Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage');
