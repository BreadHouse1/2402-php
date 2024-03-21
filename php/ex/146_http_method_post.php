<?php
    print_r($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post"> <!-- method="post"는 받는 데이터가 주소창에 뜨지않음 --> 
    <h1>검색어를 입력하세요.</h1>
    <br>
        <input type="hidden" name="hidden" value="숨겨졌다.">
        <input type="hidden" name="method" value="delete">
    <br>
        <label for="input-id"></label>
        <input type="text" name="input-id" id="input-id"> 
        <br>
        <label for="input-ps"></label>
        <input type="password" name="input-ps" id="input-ps">
        <br>
        <label for="subway">SubWay</label>
        <input type="checkbox" name="chk[]" id="subway" value="subway">
        <label for="pan">빵</label>
        <input type="checkbox" name="chk[]" id="pan" value="빵">
        <label for="do">도삭면</label>
        <input type="checkbox" name="chk[]" id="do" value="도삭면">
        <br><br>
        <label for="m">남자</label>
        <input type="radio" name="radio" id="m" value="남자">
        <label for="f">여자</label>
        <input type="radio" name="radio" id="f" value="여자">
        <br>
        <button type="submit">로그인</button>
        </form>
</body>
</html>