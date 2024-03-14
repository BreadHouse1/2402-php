<?php
// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****
$star_1 = ["*****\n","*****\n","*****\n","*****\n","*****\n"];
$loop_cnt = count($star_1);
for($num_1 = 0; $num_1 < $loop_cnt; $num_1++) {
    echo $star_1[$num_1];
}

echo "\n";

for($i = 1; $i < 6; $i++) {
    for($z = 1; $z < 6; $z++) {
    echo "*";
    }
    echo "\n";
}

echo "\n";

// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****
$star_2 = ["    *\n","   **\n","  ***\n"," ****\n","*****\n"];
$loop_cnt = count($star_2);
for($num_2 = 0; $num_2 < $loop_cnt; $num_2++) {
    echo $star_2[$num_2];
}

echo "\n";

for($i = 1; $i < 6; $i++) {
    for($z = 1; $z < $i+1; $z++) {
    echo "*";
    }
    echo "\n";
}

echo "\n";

// 아래처럼 별을 찍어주세요.
// 예시)
//     *
//    **
//   ***
//  ****
// *****
$star_3 = ["*\n","**\n","***\n","****\n","*****\n"];
$loop_cnt = count($star_3);
for($num_3 = 0; $num_3 < $loop_cnt; $num_3++) {
    echo $star_3[$num_3];
}


echo "\n";

for($i = 5,$s = 2; $i > 0; $i--, $s++) {
    for($z = 1; $z < $i; $z++) {
    echo " ";
    }
    for($o = 1; $o < $s; $o++) {
        echo "*";
    }
    echo "\n";
}