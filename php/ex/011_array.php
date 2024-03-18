<?php
// 배열 (array)
// 하나의 변수에 여러개의 갑을 담을  수 있는 데이터 타입
$arr1 = array(1, 2, 3); // 5.4 이전에 배열을 선언하던 방식
print_r($arr1);

$arr2 = [4, 5, 6]; // 5.4버전에 추가된 배열 선언 방식 (주로 사용하는 방법)
print_r($arr2);

//배열에서 특정 요소의 값을 출력하는 법
echo $arr2[0];

// 배열에 요소(item) 추가
$arr2[] = 100;

print_r($arr2);

// 배열의 특정 요소의 값 변경
$arr2[2] = 300;

print_r($arr2);

// 음식종류 5개 이상을 인덱스 배열로 만들어 주세요
$menu = [
    "햄버거", 
    "탕수육", 
    "돈까스", 
    "규카츠",
    "초밥"
];

print_r($menu);

echo 
    $menu[2].
    "\n". 
    $menu[3];


// 연관 배열
$arr_asso = [
    "name" => "홍길동",
    "age" => 20
];

print_r($arr_asso);

echo   $arr_asso["age"];

// $arr_asso 키(gender), 값(여자)인 아이템을 추가
$arr_asso["gender"] =  "여자";

print_r($arr_asso);

$arr_asso["gender"] =  "남자";

print_r($arr_asso);

// 다차원 배열
$arr_multi = [
    [1, 2, 3],
    [4, 
    [10, 11, 12],
    6],
    7
];

echo $arr_multi[0][1]."\n";
echo $arr_multi[1][2]."\n";
echo $arr_multi[1][1][1]."\n";

$arr_result = [
    ["name" => "홍길동", "age" => 20],
    ["name" => "갑돌이", "age" => 20],
    ["name" => "갑순이", "age" => 15]
];

echo $arr_result[1]["name"]."\n";
echo $arr_result[2]["age"]."\n";

// 배열의 길이
$arr = [1,2,3,4,5];

echo count($arr_result)."\n";
echo count($arr_result[0])."\n";
echo count($arr)."\n";

// unset() 배열의 특정 아이템 삭제 
// 배열의 순서는 정렬 되지않음
unset($arr[2]);

print_r($arr)."\n";
// 배열의 정렬
// asort() : 배열의 값을 기준으로 오름차순 정렬
$arr = [5,4,3,8,1];

asort($arr);

print_r($arr);

// arsort() : 배열의 값을 기준으로 내림차순 정렬
arsort($arr);

print_r($arr);

// ksort() : 배열의 키를 기준으로 내림차순 정렬
ksort($arr);

print_r($arr);

// 키는 요리명, 값은 주재료 하나로 이루어진 배열을 만들어주세요 (배열길이는 4)
$menu = [
    "돈까스" => "고기",
    "빵" => "밀가루",
    "국수" => "면",
    "피자" => "치즈"
];

// 피자의 주재료를 밀가루, 토마토, 치즈, 바질
$menu["피자"] = ["밀가루", "토마토", "치즈", "바질"];

print_r($menu);