<?php
// switch
$food = "피자";
switch($food) {
    case "김밥" :
        echo "한식";
        break;
    case "피자":
    case "햄버거" :
        echo "양식";
        break;
    default:
        echo "기타";
        break;
}
echo "\n";
// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상,
// 그 외는 노력상을 출력해 주세요

$rank = "1";
switch($rank) {
    case "1":
        echo "금상";
        break;
    case "2":
        echo "은상";
        break;
    case "3":
        echo "동상";
        break;
    case "4":
        echo "장려상";
        break;
    default:
        echo "노력상";
        break;
}
echo "\n";

// 위에 프로그램을 if문으로 변경해주세요.
if($rank === "1") {
    echo "금상";
}
else{
    if($rank === "2") {
    echo "은상";
}
else if($rank === "3") {
    echo "동상";
}
else if($rank === "4") {
    echo "장려상";
}
else {
    echo "노력상";
}
}