<?php

if (isset($_POST['register'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    include '../config/dbconfig.php';

    // 데이터베이스에 회원 정보 저장
    $query = "INSERT INTO users (id, password, name) VALUES ('$user_id', '$password', '$name')";
    mysqli_query($conn, $query);

    // 회원가입 완료 후 홈페이지로 이동
    header("Location: login.php");
    exit(); // 페이지 이동 후 코드가 실행되는 것을 방지하기 위해 exit() 함수 사용
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>KKU-GIT 회원가입</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/register.css">
</head>
<body class="join-body">
    <form method="post" class="join-form">
        <h2>KKU-GIT 회원가입</h2>

        <label class="join-label" for="user_name">
            이름 <input class="join-input" type="text" id="user_name" name="user_name" required>
       </label>

        <label class="join-label" for="user_id">
        <div class="input-group">
            아이디 <input class="join-input" type="text" id="user_id" name="user_id" required>
            <button class="verification-code-button">중복확인</button>
        </div></label>

        <br>
        <label class="join-label" for="password">
            비밀번호 <input class="join-input" type="password" id="password" name="password" required>
        <br></label>

        <label class="join-label" for="email">
        <div class="input-group">
            이메일 <input class="join-input" type="email" id="email" name="email" required>
            <button class="verification-code-button">인증코드 보내기</button>
        </div></label>
        <br>
        <label class="join-label" for="verification_code">
        <div class="input-group">
            인증코드 <input class="join-input" type="text" id="verification_code" name="verification_code" required>
            <button class="verification-check-button">확인</button>
        </div></label>
        <br>
        <div class="button-group">
            <button class="duplicate-check-button" type="submit" name="join">회원가입</button>
            <div class="button-space"></div>
            <button class="duplicate-check-button" onclick="location.href='login.php'">취소</button>
        </div>
    </form>
</body>
</html>
