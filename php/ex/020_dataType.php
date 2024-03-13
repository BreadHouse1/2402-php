<?php
// int : 숫자, 정수
var_dump(123);

// double : 실수
var_dump(3.141592);

var_dump("abcd");
var_dump('efgh');

//boolean : 논리
var_dump(true, false);

// NULL
car_dump(null);

// array : 배열
var_dump([1,2,3]);

// object : 객체
$sbj = new Date();
var_dump($obj);

// 형변한 : 변수 앞에 (데이터타입) 작성
var_dump((int)'123');
var_dump((string)456);
var_dump((int)"abc"); // int는 숫자를 출력하는데 문자를 넣어서 출력을 못함
