<?php
session_start();

// 세션 파기
session_destroy();

// 특정 세션 요소만 삭제 할 경우 unset() 사용
unset($_SESSION["my_session1"]);