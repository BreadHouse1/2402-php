<?php

namespace controller;

use model\BoardsModel;

class BoardController extends Controller {
    protected $arrBoardList = []; // 게시글 정보
    private $boardType = "0"; // 보드 타입

    // boardType getter
    public function getBoardType() {
        return $this->boardType;
    }

    // boardType setter
    public function setBoardType($boardType) {
        return $this->boardType = $boardType;
    }

    // 게시글 리스트
    protected function listGet() {
        // 보드타입 확인
        $requestData = [
            "b_type" => isset($_GET["b_type"]) ? $_GET["b_type"] : "0"
        ];

        // 보드타입 프로퍼티 셋
        $this->setBoardType($requestData["b_type"]);

        // TODO : 유효성 체크는 시간남으면 도전해보세요.
        
        // 페이지 제목
        foreach($this->arrBoardsNameInfo as $item) {
            if($item["b_type"] === $requestData["b_type"]){
                $this->boardName = $item["bn_name"];
                break;
            }
        }

        // 게시글 정보 획득
        $modelBoards = new BoardsModel();
        $this->arrBoardList = $modelBoards->getBoardList($requestData);

        // 보드모델 파기작업
        $modelBoards->destroy();

        return "boardList.php";
    }

    // 게시글 작성 메소드
    public function addPost() {
        // 이미지 파일 패스 작성
        // 현업에서는 파일 이름이 중복 될 수 있으니 UUID를 사용
        $path = "/"._PATH_IMG.$_FILES["img"]["name"];
        
        move_uploaded_file($_FILES["img"]["tmp_name"], _ROOT.$path );

        $requestData = [
            "b_type"        => $_POST["b_type"]
            ,"b_title"      => $_POST["b_title"]
            ,"b_content"    => $_POST["b_content"]
            ,"b_img"        => $path
            ,"u_id"         => $_SESSION["u_id"]
        ];

        // 글 작성 처리
        $modelBoards = new BoardsModel();
        $modelBoards->beginTransaction(); // 트랜잭션 시작
        if($resultAddBoard = $modelBoards->addBoard($requestData) === 1) {
            $modelBoards->commit();
        }
        else {
            $modelBoards->rollBack();
        }

        return "Location: /board/list?b_type=".$requestData["b_type"];

    }

    // 상세 정보 조회
    public function detailGet() {
        $requestData = [
            "b_id" => $_GET["b_id"]
        ];

        // 게시글 정보 조회
        $modelBoards = new BoardsModel();
        $resultBoard = $modelBoards->getBoard($requestData);

        // JSON 변환
        $response = json_encode($resultBoard); // json_encode : json으로 바꿔주는 내장함수

        // response 처리
        header('Content-type: application/json'); // json 데이터로 던져준다 예고
        echo $response;
        exit;
    }
}