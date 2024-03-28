<?php
require_once( $_SERVER["DOCUMENT_ROOT"]."/practice_config.php"); // 설정 파일 호출
require_once(FILE_LIB_DB);

// REQUEST_METHOD(요청방식)이 POST 일 경우 처리
if (REQUEST_METHOD === "POST") {
  try {
    // title과 content 파라미터 획득
    $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 획득
    $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 획득     

        // 파라미터 에러 체크
        $arr_err_param = [];
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
            // 예외 처리
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }

        // DB Connect
        $conn = my_db_conn(); // PDO 인스턴스

        // Transaction 시작
        $conn->beginTransaction();
        
        // 게시글 작성 처리
        $arr_param = [
            "title" => $title,
            "content" => $content
        ];
        $result = db_insert_boards($conn, $arr_param);

        // 글 작성 예외 처리
        if($result !== 1) {
            throw new Exception("Insert Boards count");
        }

        // 커밋
        $conn->commit();

        //리스트 페이지로 이동
        header("Location: practice_main.php"); 
        // 위의 입력 처리를 한 후에 list.php에서 추가된 데이터를 포함해서 새로 리스트를 만들고 사용자에게 출력해줌
    }

    catch (\Throwable $e) {
        if(!empty($conn)) {
            $conn->rollBack();
        }
        echo $e->getMessage();
        exit;
    }

    finally {
        if(!empty($conn))
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
        <form action="./practice_insert.php" method="post" enctype="multipart/form-data">
          <div class="main-middle">
            <div class="line-item">
              <label for="title" class="line-title">
                <div>제목</div>
              </label>
              <div class="line-content">
                <input type="text" name="title" id="title">
              </div>
            </div>
            <div class="input-img">
                <label for="file">
                    <div class="btn-upload">이미지 파일</div>
                </label>
            </div>
            <input type="file" accept="img/*" name="file" id="file">
            <div class="line-item">
              <label for="content" class="line-title">
                <div class="line-title">내용</div>
              </label>
              <div class="line-content">

              </div>
            </div>
          </div>
          <div class="main-bottom">
            <button type="submit" class="button-submit">작성</button>
              <a href="./practice_main.php" class="button-submit">취소</a>
          </div>
        </form>
      </main>
</body>
</html>