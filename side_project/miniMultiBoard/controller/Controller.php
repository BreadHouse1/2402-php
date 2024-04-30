<?php
namespace controller;
class Controller {
    // 생성자
    public function __construct($action) {
        // 세션 시작
        if(!isset($_SESSION)) {
            session_start();
        }
        // 유저 로그인 및 권한 체크
        // TODO : 나중에 추가

        // 해당 action 호출
        // $action= loginget 인데 $action()이라서 해당명의 함수를 실행함
        // loginget() 의 리턴인 login.php를 $resultAction에 담음
        $resultAction = $this->$action(); // $this 는 UserController.php를 가르킴

        // view 호출
        // TODO : 나중에 로케이션 처리도 되도록 수정
        require_once("view/".$resultAction);

        exit; // php 처리 종료
    }
}