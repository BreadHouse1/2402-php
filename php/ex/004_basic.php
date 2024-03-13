<?php
// 변수(Variable)
$ster = "안녕 php";

echo $ster;

// 한글로도 설정이 가능하나, 버그가 일어날 수 있으니 사용하지 말자
$숫자1 = 1;
echo $숫자1;

$user_name;

// 대소문자 식별 가능
$Num = 1;
$num = 2;
echo $Num, $num;

// 네이밍 기법
// 스네이크 기법 : 언더바 사용
$user_name;

// 카멜 기법 : 다음 단어의 첫 글자를 대문자 사용
$userName;

echo "\n";
// 상수 : 절대 변하지 않는 값
// define("상수명", 내용);
define("USER_AGE", 20);

define("USER_AGE", 30); // 이미 선언된 상수이므로 워닝이 일어나고 값이 바뀌지 않음

echo USER_AGE;

// 점심메뉴
// 탕수육 9000원
// 햄버거 10000원
// 빵 2000원

$menu = "점심메뉴\n";
$tang = "탕수육 9000원\n";
$hamberger = "햄버거 10000원\n";
$bbang = "빵 2000원\n";

echo $menu, $tang, $hamberger, $bbang;

// 스왑 : 임시변수를 만들어 번갈아가며 저장함
$swap1 = "곤드레밥";
$swap2 = "짜장면";
$tmp = "";

$tmp = $swap1;
$swap1 = $swap2;
$swap2 = $tmp;

echo $swap1, $swap2;

