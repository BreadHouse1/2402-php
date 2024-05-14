<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {
        // 유효성 검사
        // $request->validate([
        //     'email' => 'required|email|max:50' // laravel 제공 / 필수 | 형식 | 글자수제한
        //     // 'email' => ['required', 'email', 'max:50'] // 위와 동일 배열로 관리
        //     ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9]+$/'
        // ]);

        // 유효성 검사 2 : Validator 객체 생성으로 체크하는 방법(이전 페이지로 이동x)
        $validator = Validator::make(
            $request->only('email', 'password')
            ,[
                'email' => ['required', 'email', 'max:50']
                ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9]+$/'
            ]
        );

        if($validator->fails()) {
            foreach($validator->errors()->all() as $error) {
                echo $error.'<br>';
            }
            // return redirect()
            //         ->route('get.login')
            //         ->withErrors($validator->errors());
        }
        
        // -------------
        // 유저 정보 습득
        // -------------
        $resultUserInfo = User::where('email', $request->email)->first();
        $errorMsg = '';
        if(is_null($resultUserInfo)) {
            // 회원 존재 여부 체크
            $errorMsg = '존재하지 않는 회원입니다.';
        } 
        else {
            // 비밀번호 일치 체크
            if(!(Hash::check($request->password, $resultUserInfo->password))) {
                $errorMsg = '비밀번호가 일치하지 않습니다.';
            }
        }

        // 회원 정보 예외 발생시, 로그인 페이지로 리다이렉트
        if($errorMsg !== '') {
            return redirect()->route('get.login')->withErrors($errorMsg);
        }

        // -------------
        // 유저 인증 처리
        // -------------
        Auth::login($resultUserInfo);
        // Auth::id() : 로그인한 유저 pk 획득
        // Auth::login() : 로그인한 유저 정보 획득
        // Auth::check() : 현재 로그인 중인지 체크


        return redirect()->route('board.index');
    }

    // 로그아웃 처리
    public function logout(Request $request) {
        Auth::logout(); // 로그아웃
        
        // Session 객체 이용
        Session::invalidate(); // 기존 세션의 모든 데이터를 제거하고 새로운 세션 ID를 발급
        Session::regenerateToken(); // CSRF 토큰 재발급

        // Request 객체의 Session메소드 이용
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('get.login');
    }

    // 회원 가입 처리
    public function regist(Request $request) {

        // 유효성 검사
        $request->validate([
            'email' => 'required|email|max:50' // laravel 제공 / 필수 | 형식 | 글자수제한
            ,'password' => 'required|min:2|max:20|regex:/^[a-zA-Z0-9]+$/'
            ,'name' => ['required', 'regex:/^[가-힣]{2,30}$/u']
        ]);

        $insertData = $request->only('email', 'password', 'name');
        // 비밀번호 암호화
        $insertData['password'] = Hash::make($insertData['password']);

        // insert 처리
        User::create($insertData);

        return redirect()->route('get.login');
    }

    // email 체크 처리
    public function emailChk(Request $request) {
        try {
            // 응답 데이터 초기화
            $responseData = [
                'errorFlg' => true
                ,'emailFlg' => true
                ,'errorMsg' => ''
            ];

            // 유효성 검사
            $validation = Validator::make(
                $request->only('email')
                ,[
                    'email' => ['required', 'email', 'max:50']
                ]
            );
            
            if($validation->fails()) {
                throw new Exception('유효성 체크 에러');
            }

            // 이메일 체크
            $resultEmail = User::select('id')
                                    ->where('email', $request->email)
                                    ->first();

            if(!is_null($resultEmail)) {
                $responseData['emailFlg'] = true;
                throw new Exception('이메일 중복');
            }

            // 정상 처리(사용가능 이메일)
            $responseData['errorFlg'] = false;
            $responseData['emailFlg'] = false;

        } catch (\Throwable $th) {
            $responseData['errorFlg'] = true;
            $responseData['errorMsg'] = $th->getMessage();
        } finally {
            return response()->json($responseData);
        }

    }
}
