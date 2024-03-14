<?php

// if문 : 조건에 따라서 서로 다른 처리를 하는 문법
// if() 에서 ()안에 조건이 맞을경우 내용을 처리
// if( 1 > 2 ) {
//     echo "1 > 2";
// }
// else if ( 1 !== 1 ) {
//     echo " 1 === 1";
// }
// else {
//     echo "모두 false";
// }

// $num가 1이면 1등, 2면 2등, 3이면 3등, 그 외는 "순위 외" (단, 7이면 럭키세븐) 라고 출력
$num = 7;

if($num === 1) {
    echo "1등";
}
else if ($num === 2) {
    echo "2등";
}
else if($num === 3) {
    echo "3등";
}
else {
    if($num !== 7) {
        echo "순위 외";
    }
    else {
        echo "럭키세븐";
    }
}

echo "\n";

// 문제가 2개
// 1번 문제의 정답은 2, 2번 문제의 정답은 5
// 한 문제당 점수는 50점
// 둘 다 정답이면 100점
// 하나만 맞추면 50점
// 둘 다 틀리면 0점
$answer1 = 4;
$answer2 = 1;

if($answer1 === 2 && $answer2 === 5) {
    echo "100점";
}
else if($answer1 === 2 || $answer2 === 5) {
    echo "50점";
}
else {
    echo "0점";
}
echo "\n";