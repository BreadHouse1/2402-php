<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {
        // 유효성 검사
        $validator = Validator::make(
            $request->only('account', 'password')
            ,[
                'account' => ['required', 'min:4', 'max:20', 'regex:/^[a-zA-z0-9]+$/']
                ,'password' => ['required', 'min:4', 'max:20', 'regex:/^[a-zA-z0-9]+$/']
            ]
        );

        // 유효성 검사 실패시 처리
        if($validator->fails()) {
            // Validator->errors : 어디서 에러가 났는지 확인가능 toArray를 붙이면 배열형태로 확인가능
            Log::debug('유효성 검사 실패', $validator->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // 유저 정보 획득
        $userInfo = User::select('users.*')
                            ->selectSub(function($query) {
                                // DB::raw : DB라는것을인식시키기위해사용
                                $query->select(DB::raw('count(*)'))
                                            ->from('boards')
                                            ->whereColumn('users.id', 'boards.user_id');
                            }, 'boards_count')
                            ->where('account', $request->account)
                            ->first();
        
        // 유저 정보 없음
        if(!isset($userInfo)) {
            // 유저 없음
            throw new MyAuthException('E20');
        } else if(!(Hash::check($request->password, $userInfo->password))) {
            // 비밀번호 오류
            throw new MyAuthException('E21');
        }

        // 로그인 처리
        Auth::login($userInfo);

        // responseData 생성
        $responseData = [
            'code' => '0'
            ,'msg' => '로그인 성공'
            ,'data' => $userInfo
        ];

        // cookie(키이름, 키값, 시간, 경로(어디서사용할지), 도메인, 시큐리티, HTTP: 프론트에서 읽을 수있냐 없냐 차이 false면 읽을 수 있음 true는 못 읽음)
        return response()->json($responseData, 200)->cookie('auth', '1', 120, null, null, false, false);
    }

    public function logout() {
        // 로그아웃
        // Auth::user : 사용중인 유저의 모든 정보 
        Auth::logout(Auth::user());
        
        // 기존정보를 모두 없애고 새로운 세션을 생성
        Session::invalidate();

        // CSRF 토큰 재발급
        Session::regenerateToken();

        $responseData = [
            'code' => '0'
            ,'msg' => '로그아웃 완료'
        ];
        
        return response()
                    ->json($responseData, 200)
                    // 쿠키 제거 (유효시간을 -1로 줘서 제거)
                    ->cookie('auth', '1', -1, null, null, false, false);

    }

    public function registration(Request $request) {
        
        $requestData = $request->all();

        // 유효성 검사
        $validator = Validator::make(
            $requestData
            ,[
                'account' => ['required', 'unique:users', 'min:4', 'max:20', 'regex:/^[a-zA-Z0-9]+$/']
                ,'password' => ['required', 'min:2', 'max:20', 'regex:/^[a-zA-Z0-9!?]+$/']
                ,'password_chk' => ['same:password']
                ,'name' => ['required', 'min:2', 'max:20', 'regex:/^[a-zA-Z가-힣]+$/u']
                ,'gender' => ['required', 'regex:/^[0-1]{1}+$/']
                ,'profile' => ['required', 'image']
            ]
        );

        // 유효성 검사 체크
        if($validator->fails()) {
            Log::debug('유효성 검사 실패', $validator->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // 작성 데이터 생성
        $insertData = $request->all();

        // 파일 저장
        $insertData['profile'] = $request->file('profile')->store('profile');
    
        // 비밀번호 설정
        $insertData['password'] = Hash::make($request->password);

        // 인서트 처리
        $userInfo = User::create($insertData);

        $responseData = [
            'code' => '0'
            ,'msg' => '회원가입 완료'
            ,'data' => $userInfo
        ];

        return response()->json($responseData, 200);
    }

}
