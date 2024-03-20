<?php

require_once("./lib_db.php");

try {
    $conn = db_conn(); // PDO 인스턴스 생성

    // 쿼리 작성
    $sql = " DELETE FROM employees WHERE emp_no = :emp_no ";

    $arr_prepare = [
        "emp_no" => 700000
    ];

    // 트랜잭션 시작
    $conn->beginTransaction();
    $stmt = $conn->prepare($sql); // DB 질의 준비
    $stmt->execute($arr_prepare); // DB 질의 실행

    $conn->commit(); // 커밋 실행
    echo "삭제 완료\n";
} 
catch (\Throwable $e) {
    // 롤백 처리
    if(!empty($conn)) {
        $conn->rollBack();
    }
    echo "예외 발생 : ".$e->getMessage();    
}
finally {
    $conn = null;
}