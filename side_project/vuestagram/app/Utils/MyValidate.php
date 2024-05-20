<?php

namespace App\Utils;

use Illuminate\Support\Facades\Validator;

abstract class MyValidate {
    // 유효성 체크 패턴리스트
    protected $validateList;

    // 값을 받아서 체크할 함수 생성
    public function myValidate($chkData) {
        $validateItem =[];

        // 유효성 체크 리스트 재구성
        foreach($chkData as $key => $val) {
            $validateItem[$key] = $this->validateList[$key];
        }

        // 유효성 검사
        return Validator::make($chkData, $validateItem);
    }
}