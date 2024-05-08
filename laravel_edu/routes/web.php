<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

// ----------
// 라우터 정의
// ----------
// 문자열 리턴
Route::get('/hello', function() { // get(주소값/ 처리)
    return 'hello';
});

Route::get('/hi', function() {
    return '안녕하세요.';
});

// -----------
// 뷰 파일 리턴
// -----------

Route::get('/myview',function() {
    return view('myView'); // 뷰파일 호출
});

// ---------------------------
// HTTP 메소드에 대응하는 라우터
// ---------------------------
Route::get('/home', function() {
    return view('home');
});

Route::post('/home', function() {
    return 'POST HOME';
});

Route::put('/home', function() {
    return 'PUT HOME';
});

Route::delete('/home', function() {
    return 'DELETE HOME';
});

// ----------------------
// 라우터에서 파라미터 제어
// ----------------------
// 파라미터 획득
Route::get('/param', function(Request $request) {
    return 'ID :'.$request->id.", name : ".$request->name;
    // http://localhost:8000/param?id=1234&name=홍길동
});

// 세그먼트 파라미터
Route::get('/segment/{id}/{gender}', function($id, $gender) {
    return $id." : ".$gender;
    // http://localhost:8000/segment/123/남
});

Route::get('/segment2/{id}/{gender}', function(Request $request) {
    return 'ID :'.$request->id.", gender : ".$request->gender;
    // http://localhost:8000/segment2/1234/남
});

// 세그먼트 파라미터를 기본값 설정
Route::get('/segment3/{id?}', function($id = 'base') {
    return $id;
    // http://localhost:8000/segment3
});

// ------------
// 라우터명 지정
// ------------
Route::get('/name', function() {
    return view('name');
});

// name(라우터명) 메소드를 이용
Route::get('/name/home/php505/root', function() {
    return 'URL매우길다';
})->name('name.root');

// -----------------------
// 뷰에 데이터 전달
// with(키, 값) 메소드를 이용해서 뷰에 전달
// 뷰에서는 $키 로 사용이 가능하다
// -----------------------
Route::get('/send', function() {
        // 배열을 view에넘겨주는법
        $arr = [
            'id' => 1
            ,'email' => 'admin@admin.com'
        ];
    

    return view('send')
    ->with('gender', '무성')
    ->with('name', '홍길동')
    ->with('data', $arr);

    // return view('send')
    //     ->with([
    //         'gender'=> '무성'
    //         ,'name'=> '홍길동'
    //         ]);
});

// -----------------------
// 존재하지 않는 라우터 정의
// -----------------------
Route::fallback(function() { // 주소값이 없을때는 fallback으로 빠진다
    return '없는 URL입니다.';
});