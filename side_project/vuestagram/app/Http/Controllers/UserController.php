<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Models\User;
use MyToken;
use MyUserValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login(Request $request) {
        // Log::debug debug레벨이상의 모든 Log가 찍힘 .env의 LOG_LEVEL=debug 에서 수정가능
        // all() : $request의 모든 정보를 배열로 반환
        Log::debug('Start Login', $request->all());

        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
        ];

        // 유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);

        // 유효성 검사 실패 처리
        // fails() : 실패와 성공이 boolean형태로 반환한다
        if($resultValidate->fails()) {
            throw new MyValidateException('E01');
        }

        // 유저 정보 조회
        $resultUserInfo = User::where('account', $request->account)->withCount('boards')->first();

        // 미등록 유저 체크
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }

        // 패스워드 체크
        if(!Hash::check($request->password, $resultUserInfo->password)) {
            throw new MyAuthException('E21');
        }

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);

        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        return response()->json($responseData, 200);
    }

    /**
     * 로그아웃
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response()
     */
    public function logout(Request $request) {
        // 유저 정보 찾기
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        $userInfo = User::find($id);

        MyToken::removeRefreshToken($userInfo);

        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $userInfo
        ];

        return response()->json($responseData, 200);
    }

    /**
     * 토큰 재발급
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response() json
     */
    public function reissue(request $request) {
        Log::debug('********************** 토큰 재발급 시작 **********************');
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        Log::debug('베어럴 토큰 : '.$request->bearerToken());
        Log::debug('유저 PK : '.$id);
        
        // 유저 정보 획득
        $resultUserInfo = User::find($id);
        Log::debug('유저 정보 : ', $resultUserInfo->toArray());

        // 유효한 유저 확인
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }
        Log::debug('유효한 유저 확인 완료');

        // 리프래시 토큰 확인
        if($request->bearerToken() !== $resultUserInfo->refresh_token) {
            throw new MyAuthException('E23');
        }
        Log::debug('리프래시 토큰 체크 완료');

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);
        Log::debug('토큰 발행 완료');

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);
        Log::debug('토큰 저장 완료');

        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => $accessToken
            ,'refreshToken' => $refreshToken
            ,'data' => $resultUserInfo
        ];
        Log::debug('********************** 토큰 재발급 완료 **********************');
        return response()->json($responseData, 200);
        
    }

    /**
     * 회원가입 관련
     */
    public function store(Request $request) {
        // 유효성 체크용 데이터 초기화
        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
            ,'chkpassword' => $request->chkpassword
            ,'name' => $request->name
            ,'gender' => $request->gender
            ,'profile' => $request->profile 
        ];

        // 유효성 체크
        $validator = MyUserValidate::myValidate($requestData);


        // 유효성 검사 실패시 처리
        if($validator->fails()) {
            Log::debug($validator->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // 아이디 중복 체크
        $chkUser = User::where('account', $request)->first();

        if(isset($chkUser)) {
            throw new MyValidateException('E01');
        }

        // insert 데이터 생성
        $insertData = [
            'account' => $request->input('account'),
            'password' => Hash::make($request->password),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
        ];

        $filePath = $request->file('profile')->store('profile');
        $insertData['profile'] = '/'.$filePath;

        // insert 처리
        $UserInfo = User::create($insertData);

        // response 데이터 생성
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => $UserInfo
        ];

        return response()->json($responseData, 200);
    }
}