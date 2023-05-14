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