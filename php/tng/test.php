<?php
// 1~70까지 중 랜덤 수 6개를 중복되지 않게 뽑고, 그 수를 낮은 수부터 오름차순으로 배열에 넣어 출력하시오
$arr_base = range(1, 70);
$arr_num = [];
shuffle($arr_base);
$result = array_slice($arr_base, 0, 6);
if($result[0] > $result[1]) {
    $arr_num = $result[0];
    $result[0] = $result[1];
    $result[1] = $arr_num;
}
else if($number2 > $number) {
        
}


