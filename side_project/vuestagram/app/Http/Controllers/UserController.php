<?php

namespace App\Http\Controllers;

use MyUserValidate;
use Illuminate\Http\Request;
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

        }


        // response Data
        $responseData = [
            'code' => '0'
            ,'msg' => '인증 완료'
            ,'accessToken' => 'accessToken'
            ,'refreshToken' => 'refreshToken'
        ];
        return response()->json($responseData, 200);
    }
}
