<?php
require_once( $_SERVER["DOCUMENT_ROOT"]."/practice_config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB); // DB관련 라이브러리

try {
  // DB Connect
  $conn = my_db_conn(); // PDO 인스턴스 생성

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

catch (\Throwable $e) {
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
        <form action="./index.html" method="post">
          <div class="main-middle">
              <div class="detail-title">
                <?php echo $item["title"] ?>
              </div>
            <div class="inset-line">
                <div class="list-num"><?php echo $item["no"] ?></div>
                <div class="list-created"><?php echo $item["created_at"] ?></div>
            </div>
            <div class="detail-content">
              <?php echo $item["content"] ?>
            </div>
          </div>
          <div class="main-bottom">
            <a href="./practice_update.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="button-submit">수정</a>
            <a href="./practice_delete.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="button-delete">삭제</a>
            <a href="./practice_main.php?page=<?php echo $page ?>" class="button-submit">취소</a>
          </div>
        </form>
      </main>
</body>
</html>