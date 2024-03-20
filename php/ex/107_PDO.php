<?php
// DB접속 정보
$dbHost     = "localhost";  // DB Host
$dbUser     = "root"; // DB 계정명
$dbPw       = "php505"; // DB 패스워드
$dbName     = "employees"; // DB명
$dbCharset  = "utf8mb4";// DB charset
$dbDsn      = "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbCharset; // dns

// PDO 옵션
$opt = [
    // Prepared Statement로 쿼리를 준비할 때, PHP와 DB 어디에서 에뮬레이션 할지 여부를 결정
    PDO::ATTR_EMULATE_PREPARES      => false, // DB에서 에뮬레이션 하게 설정

    // PDO에서 예외를 처리하는 방식을 지정
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,

    // DB의 결과를 원하는 데이터로 저장하는 방식
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC // 연상배열로 패치
];


$conn = new PDO($dbDsn, $dbUser, $dbPw, $opt); // PDO 생성

// 쿼리 작성
// 쿼리 작성시 ""안에 제일 앞칸과 뒷칸은 한칸씩 띄울것
$sql = 
    " SELECT ".
        " emp_no ". 
    " FROM ".
        " employees ".
    " LIMIT ".

    // 데이터 수정 방식 (기존 데이터와 추가 데이터에 해당 날짜와 주석처리)
    // " 10 "; // del 240320
        " 5 " // add 240320
    ;

$stmt = $conn->query($sql); // 쿼리 준비 + 실행
$result = $stmt->fetchALL(); // 질의 결과 패치
print_r($result);

$conn = null; // PDO 파기

// - **PDO class**
//     - **PDO::beginTransaction**
//     트랜잭션 시작
//     - **PDO::commit**
//     트랜잭션 커밋
//     - **PDO::rollBack**
//     트랜잭션 롤백
//     - **PDO::errorCode**
//     DB Handle에서 마지막 작업과 관련된 SQLSTATE(DB Error Code)를 리턴
//     - **PDO::errorInfo**
//     DB Handle에서 마지막 작업과 관련된 에러 정보를 리턴
//     - **PDO::query**
//     placeholder 셋팅 없이 SQL 문을 준비하고 실행
//     - **PDO::prepare**
//     실행할 문을 준비하고 PDOStatement객체를 반환
//     - **PDO::exec**
//     SQL 문을 실행하고 영향을 받은 행의 수를 반환
//     - **PDO::lastInsertId**
//     마지막으로 삽입된 행 또는 시퀀스 값의 ID를 반환
// - **PDOStatement class**
//     - **PDOStatement::execute**
//     준비된 SQL문을 실행
//     - **PDOStatement::fetchAll**
//     Result Set에서 모든 행을 획득
//     - **PDOStatement::fetch**
//     Result Set에서 다음 행을 획득
//     - **PDOStatement::bindParam**
//     값을 지정된 파라미터명에 바인딩, placeholder 셋팅에서 이용
//     - **PDOStatement::errorCode**
//     Statement Handle에서 마지막 작업과 관련된 SQLSTATE(DB Error Code)를 리턴
//     - **PDOStatement::errorInfo**
//     Statement Handle에서  마지막 작업과 관련된 에러 정보를 리턴
//     - **PDOStatement::rowCount**
//     Returns the number of rows affected by the last SQL statement
//     - **PDOStatement::setAttribute**
//     Statement 속성을 설정
//     - **PDOStatement::setFetchMode**
//     기본 fetch 모드를 설정