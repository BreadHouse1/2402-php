<?php
// 주석

/*
  여러줄
  주석
 */
 // TODO 코멘트 : 개발자의 실수를 방지하기위해 나중에 해야할 일을 작성하는 코멘트
 // TODO : 나중에 삭제 할 것

//  echo : 현업에서 가장 많이 사용 (속도가 가장 빠름)
echo "안녕, PHP";

$num = 30;
$str_print = "당신의 점수는 %u점 입니다. <%s>";
// sprintf(변수값, %값, %값 (왼쪽부터 실행))
echo sprintf($str_print, $num, "F");

// print : 단순 출력, 현업에서는 잘 사용안함
print("프린트로 안녕");

// var_dump() : 출력하고자 하는 값의 상세정보까지 출력
var_dump("바덤프 안녕");

echo 1;