<?php

use App\Http\Controllers\BoardController;
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

Route::get('/{any}', function() {
    return view('welcome');
})->where('any', '^(?!api).*$'); // api로 시작하는 주소값이 아닌 것들만 welcome으로 넘어감

Route::post('/api/login', [UserController::class, 'login']);
Route::middleware('auth')->post('/api/logout', [UserController::class, 'logout']);

// 보드페이지
Route::middleware('auth')->get('/api/board', [BoardController::class, 'index']);
Route::middleware('auth')->get('/api/board/{id}', [BoardController::class, 'moreIndex']);

// 회원가입 페이지
Route::post('/api/registration', [UserController::class, 'registration']);

// 글 작성 페이지
Route::middleware('auth')->post('/api/createBoard', [BoardController::class, 'createBoard']);

// 글 삭제 처리
Route::middleware('auth')->delete('/api/delete/{id}', [BoardController::class, 'delete']);