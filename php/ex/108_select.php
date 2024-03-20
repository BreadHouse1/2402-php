<?php

require_once("./lib_db.php");

// try {
//     $conn = db_conn(); // PDO객체 리던 함수 호출
//     $limit = " 5; drop table employees;";
    
    
//     // placehoder 셋팅이 없는 경우
//     $sql = 
//         " SELECT ".
//             " * ". 
//         " FROM ".
//             " employees ".
//         " LIMIT ".
    
//         // 데이터 수정 방식 (기존 데이터와 추가 데이터에 해당 날짜와 주석처리)
//         // " 10 "; // del 240320
//             " 5 " // add 240320
//         ;
    
//     $stmt = $conn->query($sql); // 쿼리 준비 + 실행
//     $result = $stmt->fetchALL(); // 질의 결과 패치

//     // placeholder 셋팅이 필요한 경우
//     $sql = " SELECT * FROM employees LIMIT :limit OFFSET :offset";
//     $arr_prepare = [
//         "limit" => $limit,
//         "offset"=> 10
//     ];

    
//     $stmt = $conn->prepare($sql); // 쿼리 준비
//     $stmt->execute($arr_prepare); // 쿼리실행
//     $result = $stmt->fetchAll();
//     print_r($result);
// } 


// catch (Throwable $e) {
//     echo "예외 발생 : ".$e->getMessage()."\n";
// }

// finally {
//     $conn = null; // PDO 파기
// }

echo "-----------------------------------------------------------\n";

// 사번 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력해주세요.
// prepared statment 이용해서 작성

// try {
//     $conn = db_conn();

//     $sql = 

//     " SELECT ".
//         " emp.emp_no ,".
//         " emp.birth_date ,".
//         " sal.salary ".
//     " FROM ".
//         " employees emp ".
//             " JOIN salaries sal ".
//                 " ON emp.emp_no = sal.emp_no ".
//     " WHERE ".
//         " sal.emp_no IN (10003, 10004)".
//     " GROUP BY ".
//         " sal.emp_no "
//     ;

//     $stmt = $conn->prepare($sql); // 쿼리 준비
//     $stmt->execute($arr_prepare); // 쿼리실행
//     $result = $stmt->fetchAll();

//     print_r($result);
// } 

// catch (Throwable $e) {
//     echo "예외 발생 : ".$e->getMessage()."\n";
// }


$arr_emp_no = [10003, 10004];

try {
    // PDO 인스턴스 생성
    $conn = db_conn();

    $sql = 
    " SELECT ".
        " emp.emp_no ,".
        " emp.birth_date ,".
        " sal.salary ".
    " FROM ".
        " employees emp ".
            " JOIN salaries sal ".
                " ON emp.emp_no = sal.emp_no ".
                " AND sal.to_date >= DATE(NOW()) ".
    " WHERE ".
        " emp.emp_no IN(:emp_no1, :emp_no2) "
    ;
    $arr_prepare = [
        "emp_no1" => $arr_emp_no[0],
        "emp_no2" => $arr_emp_no[1]
    ];
    $stmt = $conn->prepare($sql); // DB 질의 준비
    $stmt->execute($arr_prepare); // DB 실행
    $result = $stmt->fetchAll(); // 질의 배치 결과
    print_r($result);
}
catch (\Throwable $e) {
    echo "예외 발생 : ".$e->getMessage();
}
finally {
    $conn = null;
}