<?php
// while문
$cnt = 0;
while($cnt < 3) {
    $cnt++;
    echo "count : $cnt \n";
}

$cnt = 0;
while(true) {
    echo $cnt;
        if($cnt === 3) {
            break;
        }
    $cnt++;
}

echo "\n";
// while를 이용해서 2단을 출력해 주세요.
// 2 X 1 = 2
// 2 X 2 = 4
// ...
// 2 X 9 = 18
$dan = 2;
$num = 1;

while(true) {
        if($num === 10) {
            break;
        }
    echo $dan." X ".$num." = ".$dan * $num."\n";
    $num++;
}

echo "\n";

$dan = 2;
$num = 1;

while($dan < 10) {
    echo "** ".$dan."단 **\n";
    while($num < 10) {
        echo $dan." X ".$num." = ".$dan * $num."\n";
        $num++;
    }
    echo "\n";
    $dan++;
    $num = 1;
}