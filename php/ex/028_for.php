<?php
// for 문
// 특정 처리를 반복해서 구현할때 사용하는 문법
// for (초기값,마지막값,루프마다출력)
for ($i=0; $i < 3; $i++) {
    // 반복할 처리
    echo $i;
}

echo "\n";

// 시작 값이 0이고, 총 10번 도는 루프문을 만들어주세요
for ($i=0; $i < 10; $i++) {
    if($i === 5) {
        // break : 루프를 종료
        break;
    }
    echo $i."번째 루프\n";
}

echo "\n";

// continue : continue 아래의 처리를 거너뛰고 그 다음 루프로 넘어감
for ($i=0; $i < 10; $i++) {
    if($i === 3 || $i === 6 || $i === 9) {
        continue;
    }
    // 반복할 처리
    echo $i."번째 루프\n";

}

echo "\n";

// 배열 루프
$arr = [1,2,3,4,5,6,7,8,9,10];
$loop_cnt = count($arr);
for($i = 0; $i < $loop_cnt; $i++) {
    echo $arr[$i];
}

echo "\n";

// 다중 루프
for($i = 1; $i < 3; $i++) {
    echo "1번 LOOP : ".$i. "번째\n";
    for($z = 1; $z < 3; $z++) {
        echo "\t2번 LOOP : ".$z."번째\n";
    }
}

// 구구단 2단 출력
$dan = 2;
for($multi_num = 1; $multi_num < 10; $multi_num++) {
    $msg_line = $dan. " X ".$multi_num. " = " .($dan * $multi_num)."\n";
    echo $msg_line;
}

// 구구단
for($dan = 2; $dan < 10; $dan++) {
    echo "** ".$dan."단 **\n";
    for($multi_num = 1; $multi_num < 10; $multi_num++) {
        $msg_line = $dan." X ".$multi_num." = ".($dan * $multi_num);
        echo $msg_line."\n";
    }
}