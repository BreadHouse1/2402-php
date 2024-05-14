<?php

use App\Http\Controllers\BoardController;
use App\Models\User;
use App\Http\Controllers\UserController;
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

// ----------
// 유저 관련
// ---------

Route::get('/', function () {
    return view('login');
})->name('get.login');

// 로그인
Route::post('/login', [UserController::class, 'login'])->name('post.login');

// 로그아웃
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// 회원가입이동
Route::get('/regist', function () {
    return view('regist');
})->name('regist.index');

// 회원가입
Route::post('/regist', [UserController::class, 'regist'])->name('regist.store');

// 이메일 체크
Route::post('/user/chk', [UserController::class, 'emailChk']);

// -----------
// 게시판 관련
// -----------

// middleware('auth') 로그인했는지 체크하고 했으면 다음처리를함
Route::middleware('auth')->resource('/board', BoardController::class);
