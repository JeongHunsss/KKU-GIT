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
    <title>Register Page</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="login-body">
<form method="post" class="login-form">
    <h2>KKU-GIT 회원가입</h2>
    <label class="login-label" for="user_id">아이디:</label>
    <input class="login-input" type="text" id="user_id" name="user_id" required>
    <label class="login-label" for="password">비밀번호:</label>
    <input class="login-input" type="password" id="password" name="password" required>
    <label class="login-label" for="name">닉네임:</label>
    <input class="login-input" type="text" id="name" name="name" required>
    <button class="login-button" type="submit" name="register">회원가입</button>
    <div><hr style="border-width: 1px; border-color: #ccc;"></div>
<<<<<<< HEAD
    <button class="cancel-button" onclick="javascript:history.back();">취소</button>
=======
    <button class="cancel-button" onclick="location.href='login.php'">취소</button>
>>>>>>> 9949747 (취소버튼 변경)
</form>
</body>
</html>