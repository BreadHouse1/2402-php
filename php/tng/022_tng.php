<?php
// IF로 만들어주세요.
// 성적
// 범위 :
//      100     : A+
//      90이상 100미만 : A
//      80이상 90미만  : B
//      70이상 80미만  : C
//      60이상 70미만  : D
//      60미만  : F
// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"
// 그 외의 값일 경우 "잘못된 갑을 입력 했습니다" 라고 출력해주세요

$num = 30;

// if($num === 100) {
//     echo "당신의 점수는 100점 입니다. <A+>";
// }

// else{
//     if($num >= 90) {
//         echo "당신의 점수는 " .$num. "점 입니다. <A>";
//     }
//     else if($num <= 89 && $num >= 80) {
//         echo "당신의 점수는 " .$num. "점 입니다. <B>";
//     }
//     else if($num <= 79 && $num >= 70) {
//         echo "당신의 점수는 " .$num. "점 입니다. <C>";
//     }
//     else if($num <= 69 && $num >= 60) {
//         echo "당신의 점수는 " .$num. "점 입니다. <D>";
//     }
//     else if($num <= 60 && $num >= 0) {
//         echo "당신의 점수는 " .$num. "점 입니다. <F>";
//     }
//     else {
//         echo "잘못된 값을 입력 했습니다";
//     }
// }
$no = 14; //점수 저장용
$grade = ""; //등급 저장용
$str_print = "당신의 점수는 %u점 입니다. <%s>"; // 정상 출력 포맷
$str_print_err = "잘못된 값을 입력 했습니다.";

if($no === 100) {
    $grade = "A+";
}
else if($no >= 90) {
    $grade = "A";
}
else if($no >= 80) {
    $grade = "B";
}
else if($no >= 70) {
    $grade = "C";
}
else if($no >= 60) {
    $grade = "D";
}
else {
    $grade = "F";
}

$msg = sprintf($str_print, $no, $grade);

echo $msg;