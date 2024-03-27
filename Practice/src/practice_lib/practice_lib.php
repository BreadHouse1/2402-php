<?php

function my_db_conn () {
    // 설정 정보
    $option = [
        PDO::ATTR_EMULATE_PREPARES      => FALSE,
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC
    ];

    // 리턴
    return new PDO(MARIADB_DSN, MARIADB_USER, MARIADB_PASSWORD, $option);
}
