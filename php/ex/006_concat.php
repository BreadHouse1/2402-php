<?php
// 연결 연산자
// 연결 연산자 사용시 데이터 타입이 숫자도 문자열로 바뀌기 때문에 string을 붙여주는게 좋음
$str1 = "안녕, ";
$str2 = "PHP!!";
$num = "1111\n";
echo $str1. $str2.(string)$num;

// 출력 : "안녕, 하세요!~"
$str1 = "안녕";
$str2 = "하세요!";

echo $str1.", ". $str2."~\n";

