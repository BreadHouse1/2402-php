<?php

namespace App\Utils;

use Illuminate\Support\Str;

class MyEncrypt {
    /**
     * base64 URL 인코드
     * 
     * @param string $jsgon
     * @return string base64 URL encode
     */
    public function base64UrlEncode(string $json) {
        // strtr(값, 체크할기호, 바꿀기호) : ex) qwe+qwe/qwe -> qwe-qwe_qwe
        // rtrim(값, 제거할 값) : ex) ==qwe=qwe -> qweqwe
        return rtrim(strtr(base64_encode($json), '+/', '-_'), '=');
    }

    /**
     * base64 URL 디코드
     * 
     * @param string base64 URL encode
     * @return string $json
     */
    public function base64UrlDecode(string $base64) {
        // base64 암호화를 다시 원래 값으로 가져올때 작업
        return base64_decode(strtr($base64, '-_', '+/'));
    }

        /**
     * 암호화한 문자열 생성
     * 
     * @param string $alg 알고리즘 명
     * @param string $str 암호화 할 문자열
     * @param string $salt 솔트 길이
     * @return string 암호화 된 문자열
     */
    public function hashWithSalt(string $alg, string $str, string $salt) {
        // 밑에 salt를 만들어서 붙이는 이유는 암호화를 더 복잡하게 하기위해서
        return hash($alg, $str).$salt;
    }

    /**
     * 특정 길이 만큼의 랜덤한 문자열 생성
     * 
     * @param int $saltLength
     * @return string 랜덤 문자열
     */
    public function makeSalt($saltLength) {
        // Str::random 랜덤한 문자열을 생성하는 메소드
        return Str::random($saltLength);
    }
}