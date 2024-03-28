<?php
require_once( $_SERVER["DOCUMENT_ROOT"]."/practice_config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

try {
  // DB Connect
  $conn = my_db_conn(); // PDO 인스턴스 생성

  // Method가 GET인지 POST인지 판별
  if(REQUEST_METHOD === "GET") {
    
      // 게시글 데이터 조회
      // 파라미터
      $no = isset($_GET["no"]) ? $_GET["no"] : ""; // no 획득
      $page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 획득
    
      // 파라미터 예외처리
      $arr_err_param = [];
      if($no === "") {
        $arr_err_param[] = "no";
      }
    
      if($page === "") {
        $arr_err_param[] = "page";
      }
    
      if(count($arr_err_param) > 0) {
        throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
      }
    
      // 게시글 정보 획득
      $arr_param = [
        "no" => $no
      ];
      $result = db_select_boards_no($conn, $arr_param);
    
      if(count($result) !== 1) {
        throw new Exception("Select Boards no count");
      }
    
      // 아이템 셋팅
      $item = $result[0];

  }

  else if (REQUEST_METHOD === "POST") {
    
    // 파라미터 획득
    $no = isset($_POST["no"]) ? $_POST["no"] : ""; // no 획득

    $arr_err_param = [];
    if($no === "") {
      $arr_err_param[] = "no";
    }

    if(count($arr_err_param) > 0) {
      throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
    }

    // Transaction 시작
    $conn->beginTransaction();

    // 게시글 정보 삭제
    $arr_param = [
      "no" => $no
    ];
    $result = db_delete_boards_no($conn, $arr_param);

    // 삭제 예외 처리
    if($result !== 1) {
      throw new Exception ("Delete Boards no count");
    }

    // commit
    $conn->commit();

    // 리스트 페이지로 이동
    header("Location: practice_main.php");
    exit;
  }
}

catch (\Throwable $e) {
  if(!empty($conn)) {
    $conn->rollBack();
  }
  
  echo $e->getMessage();
  exit;
}

finally {
  // PDO 파기
  if(!empty($conn)) {
    $conn = null;
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../practice_css/practice_common.css">
</head>
<body>
    <main>
        <div class="main-middle">
            <div class="detail-title">
              제목
            </div>
            <div class="inset-line">
                <div class="list-num"><?php echo $item["no"] ?></div>
                <div class="list-created"><?php echo $item["created_at"] ?></div>
            </div>
            <div class="delete-content">
                삭제하면 영구적으로 복구 할 수 없습니다.<br>
                정말로 삭제 하시겠습니까?
            </div>
        </div>
          <form action="./practice_delete.php" method="post">
              <div class="main-bottom">
                  <input type="hidden" name="no" value="<?php echo $no ?>">
                  <button type="submit" class="button-delete">삭제</button>
                  <a href="./practice_detail.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="button-submit">취소</a>
              </div>
        </form>
    </main>
</body>
</html>