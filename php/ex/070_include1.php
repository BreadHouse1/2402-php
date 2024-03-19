<?php
echo "include 1";

// 다른 파일에 있는 코드를 현재 파일로 불러옴
// 불러올때 오류가 나도 처리를 계속 진행함
include("./070_include2.php");

// 여러번 불러와도 중복이면 하나만 불러옴 (include는 중복 될 수 있으니 현업에서는 include_once를 주로사용
include_once ("./070_include2.php");
include_once ("./070_include2.php");
include_once ("./070_include2.php");

echo my_sum(1, 2);