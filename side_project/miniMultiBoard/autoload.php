<?php
spl_autoload_register(function($path) { // spl_autoload_register(내장함수)
    $path = str_replace("\\", "/", $path); // 역슬래시를 슬래시로 변환 \는 이스케이프문자이므로 2번 적어야 됨

    require_once($path.".php"); // 해당 파일 불러오기
});