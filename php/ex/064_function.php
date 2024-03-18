<?php
function my_sum($num1, $num2){
    return $num1 + $num2;
}

echo my_sum(32, 54)."\n";

// 파라미터 default 설정

/**
 * 두 숫자를 더하는 함수
 * 
 * @param int $num1 더할 첫번째 숫자
 * @param int $num2 더할 두번째 숫자, default 10
 * @return int 합계 
 */
function my_sum2(int $num1, int $num2 = 10){
    return $num1 + $num2;
}

echo my_sum2(1)."\n";

// -, *, /, % 를 해주는 각각의 함수를 만들어 주세요

/**
 * 두 숫자를 빼는 함수
 */
function my_sub(int $num1, int $num2){
    return $num1 - $num2;
}

echo my_sub(10,5)."\n";

/**
 * 두 숫자를 곱하는 함수
 */
function my_mul(int $num1, int $num2){
    return $num1 * $num2;
}

echo my_mul(10, 5)."\n";

/**
 * 두 숫자를 나누는 함수
 */
function my_div(int $num1, int $num2){
    return $num1 / $num2;
}

echo my_div(5, 5)."\n";

/**
 * 두 숫자의 나머지를 구하는 함수
 */
function my_rem(int $num1, int $num2){
    return $num1 % $num2;
}

echo my_rem(5, 10)."\n";

function test(string $str) {
    $str = "test()에서 변경";
    return $str;
}

$str = "처음 정의";
echo test($str);

// 가변 길이 파라미터
//(...변수) : 파라미터 갯수에 따라 배열로 만들어 넣어줌
//PHP 5.4이하 버전은 변수 = func_get_args(); 를 사용
function my_sum_all(...$numbers) {
    print_r($numbers);
}

my_sum_all(3,5,2,5,3,7,1,8);

//파라미터로 받은 모든 수를 더하는 함수를 만들어 주세요

function my_arr_sum(...$num1) {
    $sub = 0;
    foreach ($num1 as $item) {
        $sub2 = $item;
        $sub3 = $sub + $sub2;
        $sub = $sub3;
    }
    return $sub;
}

echo my_arr_sum(1,5,4);

echo "\n";

//해답
function my_sum_all2(...$numbers){
    $sum = 0; //합계 저장용 변수

    //파라미터 루프해서 값을 획득 후 더하기
    foreach($numbers as $val) {
        $sum += $val;
    }

    //합계 리턴
    return $sum;
}

echo my_sum_all2(5,4,5,6);

echo "\n";

// 참조 전달 : ()안에 &사용
function test_v($num) {
    $num = 3;
    return $num;
}

function test_r(&$num) {
    $num = 5;
}

$num = 0;
echo test_v($num)."\n";
echo test_r($num);
echo $num;

echo "\n";

//참조 변수
$a = 1;
$b = &$a;
$a = 3;

echo $b;