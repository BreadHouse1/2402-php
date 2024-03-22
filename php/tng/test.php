<?php
// 1~70까지 중 랜덤 수 6개를 중복되지 않게 뽑고, 그 수를 낮은 수부터 d로 배열에 넣어 출력하시오
$arr_base = range(1, 70);
$arr_num = [];
shuffle($arr_base);
$result = array_slice($arr_base, 0, 6);
print_r($result);
for($i = 0,$s = 0; $s < 5; $i++,$s++) {
    if($result[$i] > $result[$i+1]){
        $arr_num = $result[$i];
        $result[$i] = $result[$i+1];
        $result[$i+1] = $arr_num;
    }
}
$i = 0;
for($i = 0,$s = 0; $s < 5; $i++,$s++) {
    if($result[$i] > $result[$i+1]){
        $arr_num = $result[$i];
        $result[$i] = $result[$i+1];
        $result[$i+1] = $arr_num;
    }
}
$i = 0;
for($i = 0,$s = 0; $s < 5; $i++,$s++) {
    if($result[$i] > $result[$i+1]){
        $arr_num = $result[$i];
        $result[$i] = $result[$i+1];
        $result[$i+1] = $arr_num;
    }
}
$i = 0;
for($i = 0,$s = 0; $s < 5; $i++,$s++) {
    if($result[$i] > $result[$i+1]){
        $arr_num = $result[$i];
        $result[$i] = $result[$i+1];
        $result[$i+1] = $arr_num;
    }
}
$i = 0;
for($i = 0,$s = 0; $s < 5; $i++,$s++) {
    if($result[$i] > $result[$i+1]){
        $arr_num = $result[$i];
        $result[$i] = $result[$i+1];
        $result[$i+1] = $arr_num;
    }
}


print_r(array_slice($result,0,6));

// 1~100 까지 숫자중 3의 배수를 제외하고 아래처럼 출력해주세요.

// for($i = 1, $s = 1; $i < 101; $i++, $s++) {
//     if ($s < 3) {
//         echo $i."입니다.\n";
//     }
//     else {
//         echo "";
//     }
//     if ($s === 3) {
//         $s = 0;
//     }
// }