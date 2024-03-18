<?php
// trim(문자열) : 공백을 제거하는 함수
$str = "  홍길동 ";
echo trim($str)."\n";

// strtoupper(문자열) : 영어를 대문자로 출력하는 함수
echo strtoupper("asdfqwer\n"); 
// strtolower(문자열) : 영어를 소문자로 출력하는 함수
echo strtolower("asdfqwer\n");

// str_replace(대상문자열, 변경문자열, 대상문자열) : 특정 문자를 치환해주는 함수
echo str_replace("s","","asdfqwer\n");

//mb_substr(문자열, 시작위치, 출력할개수) : 문자열을 시작위치에서 종료위치까지 잘라서 반환하는 함수
$str = "홍길동갑순이";
echo mb_substr ($str, 1, 4)."\n";

// mb_strpos(대상 문자열, 검색할 문자열 : 검색할 문자열이 있는 위치(in)가 반환
$sry = "나는 홍길동이다";
echo mb_strpos($sry, "홍")."\n";

if(mb_strpos($sry, "나") !==false) {
    echo "포함됨\n";
}
else {
    "없어";
}

// sprintf(포맷문자열, 대입 문자열1, 대입문자열, ...)
// %s : 문자열을 대입
// %d : 정수를 대입 (양수와 0, 음수 모두를 표현)
// %u : 정수를 대입 (양수만 표현)
// %f : 부동 소수점 수를 대입. f앞에 .n을 입력하여 소숫점 자리수 표현 가능
// 예) %.2f 로작성할 경우 소숫점 2자리 까지 표현
$base_msg = "%s이/가 틀렸습니다.";

$print_msg = sprintf($base_msg,"비밀번호");

echo $print_msg."\n";

// isset(변수) : 변수의 설정 여부 확인 true/false 리턴
$ans1 = "";
$ans2 = null;
$ans3 = 0;
$ans4 = [];
var_dump(isset($ans1), isset($ans2), isset($ans3), isset($ans4), isset($ans5));

echo "\n";

// empty(변수) : 변수의 값이 비어있는지 확인, ture/ false 리턴
var_dump(empty($ans1), empty($ans2), empty($ans3), empty($ans4), empty($ans5));

// gettype(변수) : 테이터 타입을 문자열로 반환
$str1 = "abc";
$int = 5;
$arr1 = [];
$double = 1.4;
$boo = true;
$obj = new datetime()
;$null1 = null;

var_dump(gettype($str1), gettype($int), gettype($arr1), gettype($double), gettype($boo), gettype($null1), gettype($obj));

// settype(변수) : 변수의 데이터 형을 변환, 원본 변수 자체가 변경되므로 주의
$i = 3;
$i2 = settype($i, "string");
var_dump($i, $i2);

// time() : 유닉스 타임스탬프
echo time()."\n";

// date(포맷형식, 타임스팸프값) ; 타임스탬프 값을 날짜 포맷형식으로 변환해서 반환
// 2000-01-01 13:50:06
echo date("Y-m-d H:i:s",time());
// 원하는 시간을 찾을 때 time()+-초
echo date("Y-m-d H:i:s",time()-86400);

echo "\n";

// ceil(숫자) : 올림, round(숫자) : 반올림, floor(숫자) : 내림
var_dump(ceil(1.4), round(2.5), floor(1.9));

// random_int(시작값, 마지막값) : 시작값~마지막값 범위의 랜덤한 숫자를 반환
echo random_int(1,15);