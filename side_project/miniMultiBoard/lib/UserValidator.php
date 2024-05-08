<?php

namespace lib;

class UserValidator {

    public static function chkValidator(array $param_arr) { // chkValidator(array $param_arr) 받을 파라미터를 array타입으로 한정함
        // 에러 메세지 보관용
        $arrErrorMsg = [];
        
        // 패턴 생성 / 노션에 정규표현식 참조
        $patternEmail = "/^[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}@[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}\.[a-zA-Z]{2,3}$/";
        $patternPassword = "/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*])\S{8,20}$/"; // 문자와 숫자 특수기호가 최소 한개씩은 있어야함 {8,20} 8~20자 까지 허용
        $patternName = "/^[가-힣]{1,50}$/u";

        // 이메일 체크
        // array_key_exists ("찾는키", 체크할 배열) 배열에 특정 키가 있는지 체크 있으면 true 없으면 false
        if(array_key_exists("u_email", $param_arr)) {
            // preg_match (패턴, 문자열, 담을변수) : 특정 문자열에서 패턴을 찾고 변수에 담음
            if(preg_match($patternEmail, $param_arr["u_email"], $matches) === 0) {
                $arrErrorMsg[] = "이메일 형식이 맞지 않습니다.";
            }
        }

        // 이름 체크
        // array_key_exists ("찾는키", 체크할 배열) 배열에 특정 키가 있는지 체크 있으면 true 없으면 false
        if(array_key_exists("u_name", $param_arr)) {
            // preg_match (패턴, 문자열, 담을변수) : 특정 문자열에서 패턴을 찾고 변수에 담음
            if(preg_match($patternName, $param_arr["u_name"], $matches) === 0) {
                $arrErrorMsg[] = "이름은 한글만 입력해 주세요.";
            }
        }

        // if(array_key_exists("u_pw", $param_arr) && array_key_exists("u_pw_chk", $param_arr)) {
        //     if ($param_arr["u_pw"] !== $param_arr["u_pw_chk"]) {
        //         $arrErrorMsg[] = "비밀번호가 서로 다릅니다.";
        //     }
        // }

        // 패스워드 체크
        if(array_key_exists("u_pw", $param_arr)  && array_key_exists("d_u_pw", $param_arr) && array_key_exists("u_email", $param_arr) && array_key_exists("u_pw_chk", $param_arr)) {
            $u_pw = base64_encode($param_arr["u_pw"].$param_arr["u_email"]);
            if ($u_pw === $param_arr["d_u_pw"]) {
                $arrErrorMsg[] = "이전 비밀번호와 같습니다.";
            }
            else if(preg_match($patternPassword, $param_arr["u_pw"], $matches) === 0) {
                $arrErrorMsg[] = "비밀번호는 영어 대소문자 및 숫자, 특수문자(!,@)로 8~20자로 작성해주세요.";
            }
            else if ($param_arr["u_pw"] !== $param_arr["u_pw_chk"]) {
                $arrErrorMsg[] = "비밀번호가 서로 다릅니다.";
            }
        }

        // if (array_key_exists("u_pw", $param_arr)  && array_key_exists("u_pw_chk", $param_arr)) {
        //     // preg_match (패턴, 문자열, 담을변수) : 특정 문자열에서 패턴을 찾고 변수에 담음
        //     if(preg_match($patternPassword, $param_arr["u_pw"], $matches) === 0) {
        //         $arrErrorMsg[] = "비밀번호는 영어 대소문자 및 숫자, 특수문자(!,@)로 8~20자로 작성해주세요.";
        //     }
        //     if ($param_arr["u_pw"] !== $param_arr["u_pw_chk"]) {
        //         $arrErrorMsg[] = "비밀번호가 서로 다릅니다.";
        //     }
        // }


        return $arrErrorMsg;
    }
}

// static을 쓰면 해당 메소드는 객체화 하지않고 사용이 가능

// static을 사용하지 않을 경우
// $obj = new UserValidator();
// $obj->chkValidator([]);

// static을 사용할 경우 UserValidator::chkValidator([]);
    