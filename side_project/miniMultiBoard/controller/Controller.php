<?php

namespace controller;

use model\BoardsnameModel;

class Controller {

    // 화면에 표시할 에러 메세지
    protected $arrErrorMsg = []; // 에러 메세지 리스트 빈배열 생성
    protected $arrBoardsNameInfo = []; // 헤더 게시판 드롭다운 리스트
    protected $boardName = ""; // 게시판이름 

    // 비로그인시 접속 불가능한 URL리스트
    private $arrNeedAuth = [
        "board/list"
    ];


    // 생성자
    public function __construct($action) {
        // 세션 시작
        if(!isset($_SESSION)) {
            session_start();
        }
        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

        // 헤더 드롭다운 리스트 획득
        $modelboardsname = new BoardsnameModel;
        $this->arrBoardsNameInfo = $modelboardsname->getBoardsnameList();
        $modelboardsname->destroy();
        

        // 해당 action 호출
        // $action= loginget 인데 $action()이라서 해당명의 함수를 실행함
        // loginget() 의 리턴인 login.php를 $resultAction에 담음
        $resultAction = $this->$action(); // $this 는 UserController.php를 가르킴

        // view 호출
        // TODO : 나중에 로케이션 처리도 되도록 수정
        $this->callView($resultAction);

        exit; // php 처리 종료
    }

    // 뷰 OR 로케이션 처리용 메소드
    private function callView($path) {
        if(strpos($path, "Location:") === 0) { // $path에서 문자열 "Location:"가 있으면 0 없으면 false로 반환
            header($path);
        }
        else {
            require_once("view/".$path);
        }
    }

    // 유저 권한 체크용 메소드
    private function chkAuthorization() {
        $url = $_GET['url']; // 접속 url획득

        // 접속 권한이 없는 페이지 접속 차단
        if(!isset($_SESSION['u_id']) && in_array($url, $this->arrNeedAuth)) {
            header("Location: /user/login");
            exit;
        }

        // 로그인한 상태에서 user/login 접속 시 board/list로 이동
        if(isset($_SESSION['u_id']) && $url === "user/login") {
            header("Location: /board/list");
            exit;
        }
    }
}