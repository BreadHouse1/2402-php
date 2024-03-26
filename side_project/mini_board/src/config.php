<?php
// MariaDB 관련																
define("MARIADB_HOST", "localhost");								
define("MARIADB_USER", "root");							
define("MARIADB_PASSWORD", "php505");							
define("MARIADB_NAME", "mini_board");							
define("MARIADB_CHARSET", "utf8mb4");							
define("MARIADB_DSN", "mysql:host=".MARIADB_HOST.";dbname=".MARIADB_NAME.";charset=".MARIADB_CHARSET);
                                                            
                                                            
// PHP Path 관련																
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/"); // 웹서버 root 패스															
define("FILE_HEADER", ROOT."header.php"); // 헤더 파일 패스															
define("FILE_LIB_DB", ROOT."lib/lib_db.php"); // DB 파일 패스															
                                                            
// 유저 요청 정보
define("REQUEST_METHOD", strtoupper($_SERVER["REQUEST_METHOD"])); //($_SERVER["REQUEST_METHOD"]) 현재 데이터 요청 방식이 GET 인지 POST인지 묻는 함수