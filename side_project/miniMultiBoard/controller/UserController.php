<?php

namespace controller;

use model\UsersModel;
use lib\UserValidator;

class UserController extends Controller {
    private $userInfo;

    public function myGetUserInfo($key) {
        return $this->userInfo[$key];
    }

    // 로그인 페이지로 이동
    protected function loginGet(){
        return "login.php";
    }

    // 로그인 처리
    protected function loginPost(){
        // 유저 입력 정보 획득
        $requestData = [
        "u_email" => $_POST["u_email"]
        ,"u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "login.php";
        }

        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

        // 유저정보 획득
        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($requestData);

        // 유저 존재 유무 체크
        if(empty($resultUserInfo)) {
            // 에러메세지
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";

            return "login.php";
        }

        // 세션에 u_id 저장 / 세션은 서버에저장 쿠키는 유저의 브라우저에 저장
        $_SESSION["u_id"] = $resultUserInfo["u_id"];

        // 로케이션 처리
        // TODO : 보드 리스트 게시판 타입 수정 할 때 같이 수정
        return "Location: /board/list";
    }

    // 로그아웃 처리
    protected function logoutGet() {
        session_destroy(); // 세션전체를 삭제
        // session_unset(); // ()안의 해당 키의 세션만 삭제

        return "Location: /user/login"; //Location을 쓸때 :붙이고 한칸띄운다음 주소 쓸 것 
    }

    // 회원 가입 페이지 이동
    protected function registGet() {
        return "regist.php";
    }

    // 회원 가입 처리
    protected function registPost() {
        // 유저 입력 정보 획득
        $requestData = [
            "u_email"   => $_POST["u_email"]
            ,"u_pw"     => $_POST["u_pw"]
            ,"u_name"   => $_POST["u_name"]
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "regist.php";
        }
        
        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $requestData["u_email"]);

        // 이메일 중복 체크
        $selectData = [
            "u_email" => $requestData["u_email"]
        ];

        $modelUsers = new UsersModel();
        $resultUserInfo = $modelUsers->getUserInfo($selectData);

        if(count($resultUserInfo) > 0) {
            $this->arrErrorMsg = ["이미 가입한 이메일 입니다."];
            return "regist.php";
        }

        // 회원 정보 인서트 처리
        $modelUsers->beginTransaction();
        $resultUserInsert = $modelUsers->addUserInfo($requestData);
        if($resultUserInsert === 1) {
            $modelUsers->commit();
        }
        else {
            $modelUsers->rollBack();
            $this->arrErrorMsg = ["회원가입에 실패 했습니다."];
            return "regist.php";
        }

        return "Location: /user/login";
    }

    // 이메일 체크 처리
    protected function chkEmailPost() {
        // 유저 입력 데이터 획득
        $requestData = [
            "u_email" => $_POST["u_email"]
        ];

        // response 데이터 초기화 
        $responseArr = [
            "errorFlg" => false
            ,"errorMsg" => ""
        ];

        // 유효성 체크
        $resultValidator = UserValidator::chkValidator($requestData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
        }
        else {
            // 이메일 중복 체크
            $modelUsers = new UsersModel();
            $resultUserInfo = $modelUsers->getUserInfo($requestData);
    
            if(count($resultUserInfo) > 0) {
                $this->arrErrorMsg = ["이미 가입한 이메일 입니다."];
            }
        }

        // response 데이터 셋팅
        if(count($this->arrErrorMsg) > 0) {
            $responseArr["errorFlg"] = true;
            $responseArr["errorMsg"] = $this->arrErrorMsg;
        }

        // response 처리
        header('Content-type: application/json');
        echo json_encode($responseArr);
        exit;

    }

    // 비밀번호 암호화
    // base64_encode(); base64를 기반으로 암호화 해주는 함수
    private function encryptionPassword($pw, $email) {
        return base64_encode($pw.$email);
    }

    // 유저 정보 수정

    protected function updateGet() {

        $selectData = [
            "u_id" => $_SESSION["u_id"]
        ];

        // 가져온 정보를 세션의 키에 담아서 update로 보내줌
        $modelUsers = new UsersModel();
        $this->userInfo = $modelUsers->getUserInfo($selectData);
        return "update.php";
    }

    // 회원 정보 수정 처리
    protected function updatePost() {
        // 유저 정보 획득
        $modelUsers = new UsersModel();

        $selectData = [
            "u_id" => $_SESSION["u_id"]
        ];

        $this->userInfo = $modelUsers->getUserInfo($selectData);
        
        // 유저 입력 정보 획득
        $requestData = [
            "u_pw"     => $_POST["u_pw"]
            ,"u_name"     => $_POST["u_name"]
            ,"u_id"     => $_SESSION["u_id"]
        ];

        // 유효성 체크
        $requestChkData = [
            "u_pw"     => $_POST["u_pw"]
            ,"u_pw_chk" => $_POST["u_pw_chk"]
            ,"u_name"     => $_POST["u_name"]
            ,"u_id"     => $_SESSION["u_id"]
            ,"d_u_pw" => $this->myGetUserInfo("u_pw")
            ,"u_email" => $this->myGetUserInfo("u_email")
        ];

        $resultValidator = UserValidator::chkValidator($requestChkData);
        if(count($resultValidator) > 0) {
            $this->arrErrorMsg = $resultValidator;
            return "update.php";
        }
        
        // 비밀번호 암호화
        $requestData["u_pw"] = $this->encryptionPassword($requestData["u_pw"], $this->myGetUserInfo("u_email"));

        // 회원 정보 인서트 처리
        $modelUsers->beginTransaction();
        $resultUserInsert = $modelUsers->updateUserInfo($requestData);

        if($resultUserInsert === 1) {
            $modelUsers->commit();
        }
        else {
            $modelUsers->rollBack();
            $this->arrErrorMsg = ["정보 수정에 실패 했습니다."];
            return "update.php";
        }

        return "Location: /board/list";
    }
}

