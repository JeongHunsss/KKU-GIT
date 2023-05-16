<?php
session_start();

include '../config/dbconfig.php';

// 로그인 양식 제출 확인
if (isset($_POST['login'])) {
    // 입력된 사용자 이름과 비밀번호 가져오기
    $user_id = isset($_POST['user_id']) ? mysqli_real_escape_string($conn, $_POST['user_id']) : '';
    $user_password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

    // 데이터베이스에서 사용자 이름과 비밀번호 확인
    $query = "SELECT * FROM user WHERE id='$user_id' AND password='$user_password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        // 세션 시작 및 로그인 후 페이지로 이동
        $user_info = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user_info['id'];
        $_SESSION['name'] = $user_info['name'];
        header('Location: ../main/main.php');
    } else {
        // 로그인 실패 메시지 표시
        $error = '아이디 또는 패스워드가 틀립니다.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body class="login-body">
<form method="post" class="login-form">
    <h2>KKU-GIT 로그인</h2>
    <label class="login-label" for="user_id">아이디:</label>
    <input class="login-input" type="text" id="user_id" name="user_id" required>
    <label class="login-label" for="password">비밀번호:</label>
    <input class="login-input" type="password" id="password" name="password" required>
    <button class="login-button" type="submit" name="login">로그인</button>
    <div><hr style="border-width 1px; border-color:#ccc;"></div>
    <button class="cancel-button" onclick="location.href='joinpage.php'">회원가입</button>
</form>
</body>
</html>