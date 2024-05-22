<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// login으로 이동후 usercontroller의 class에서 login인 함수를 실행
// 처음 이동할 때 login주소는 앞에 api/login이 생략된거라서 자동으로 api로 인식함
Route::post('/login', [UserController::class, 'login']);
Route::middleware('my.auth')->post('/logout', [UserController::class, 'logout']);

// 보드 관련
Route::middleware('my.auth')->get('/board/{id}/list', [BoardController::class, 'index']);

// 유효하지 않은 URL
Route::fallback(function() {
    return response()->json(['code' => 'E90']); 
});