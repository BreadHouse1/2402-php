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

//mb_substr(문자열, 시작위치, 출력할개수) : 문자열을 시작위체에서 종료위치까지 잘라서 반환하는 함수
$str = "홍길동갑순이";
echo mb_substr ($str, 1, 4)."\n";

// mb_strpos(대상 문자열, 검색할 문자열 : 검색할 문자열이 있는 위치(in)가 반환
$sry = "나는 홍길동이다";
echo mb_strpos($sry, "홍")."\n";

if(mb_strpos($sry, "ㅁ")) {
    echo "포함됨";
}
else {
    "없어";
}