<?php
// 쿠키 삭제
// setcookie를 똑같이 셋팅하고 시간을 음수로 입력
setcookie("my_cookie2", "쿠키2",time () - 3600);