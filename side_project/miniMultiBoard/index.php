<?php

// 설정 파일 불러오기
require_once("./config.php");

// 오토로드 호출
require_once("autoload.php");

// namespace router의 class router 객체생성 및 생성자 호출
new router\Router();