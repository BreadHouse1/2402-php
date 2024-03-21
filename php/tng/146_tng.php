<?php
    $input_id = isset($_GET["input-id"]) ? $_GET["input-id"] : "";
    $input_ps = isset($_GET["input-ps"]) ? $_GET["input-ps"] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
    <h1>검색어를 입력하세요.</h1>
    <br>
        <label for="input-id"></label>
        <input type="text" name="input-id" id="input-id" required> 
        <br>
        <label for="input-ps"></label>
        <input type="password" name="input-ps" id="input-ps" required>
        <button type="submit">로그인</button>
        </form>
        <?php
        if($input_id !== "") {
            echo "<h2>당신의 아이디는 $input_id 입니다.</h2>";
        }
    ?>
        <?php
        if($input_ps !== "") {
            echo "<h2>당신의 비밀번호는 $input_ps 입니다.</h2>";
        }
    ?>
</body>
</html>