<?php
session_start(); 

include '../config/dbconfig.php';

// 초기화
$isSend = 0; // 메일 보내기 성공 여부
if (!isset($_SESSION['is_duplication'])) {
    $_SESSION['is_duplication'] = 0;
}

if (!isset($_SESSION['isChecking'])) {
    $_SESSION['isChecking'] = 0;
}


// 회원가입
if (isset($_POST['regist'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $user_name = $_POST['user_name'];
    if($user_id){
        if($password){
            if($user_name){
                if($_SESSION['isChecking'] === 1 and $_SESSION['is_duplication'] === 1){

                    // 데이터베이스에 회원 정보 저장
                    $query = "INSERT INTO user (id, password, name) VALUES ('$user_id', '$password', '$user_name')";
                    mysqli_query($conn, $query);

                    // 세션변수 무작위로 변경
                    $code = rand(100000, 999999);
                    $_SESSION['verification_code'] = $code;
                    $_SESSION['is_duplication'] = $code;
                    $_SESSION['isChecking'] = $code;

                    echo '<script>alert("회원가입이 완료되었습니다.");</script>';
                    // 회원가입 완료 후 홈페이지로 이동
                    echo '<script>window.location.href = "login.php";</script>';
                    exit(); // 페이지 이동 후 코드가 실행되는 것을 방지하기 위해 exit() 함수 사용
                } else {
                    echo '<script>alert("이메일 인증과 아이디 중복확인을 해야합니다.");</script>';
                }
            } else {
                echo '<script>alert("이름을 입력해주세요.");</script>';
            } 
        } else {
            echo '<script>alert("비밀번호를 입력해주세요.");</script>';
        }
    } else {
        echo '<script>alert("아이디를 입력해주세요.");</script>';
    }
}
//취소 버튼 누를 시
if (isset($_POST['cancel'])) {
    // 세션변수 무작위로 변경
    $code = rand(100000, 999999);
    $_SESSION['verification_code'] = $code;
    $_SESSION['is_duplication'] = $code;
    $_SESSION['isChecking'] = $code;
    echo '<script>window.location.href = "login.php";</script>';
}

//아이디 중복 확인
if (isset($_POST['duplication_verify'])) {
    $user_id = $_POST['user_id'];

    // 아이디 확인
    $query = "SELECT id FROM user WHERE id='$user_id'";
    $id_search = mysqli_query($conn, $query);

    if (mysqli_num_rows($id_search) === 0){  // 중복되는 아이디 없음
        $_SESSION['is_duplication'] = 1;
    } else {    //중복되는 아이디 있음
        $_SESSION['is_duplication'] = 2;
    }
}

//이메일 전송
if (isset($_POST['email_send'])) {
    $receiver_email = $_POST['email'].'@kku.ac.kr';
    $code = rand(10000, 99999);
    $_SESSION['verification_code'] = $code; // 세션에 인증 코드 저장
    include '../config/mailerconfig.php';
}
//인증코드 확인
if (isset($_POST['code_check'])) {
    $verification_code = $_POST['verification_code'];
    if($verification_code == $_SESSION['verification_code']){
        $_SESSION['isChecking'] = 1;
        $code = rand(10000, 99999);
        $_SESSION['verification_code'] = $code;  // 세션변수 무작위로 변경
    } else {
        $_SESSION['isChecking'] = 2;
    }
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
            이름 <input class="join-input" type="text" id="user_name" name="user_name" 
                value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : ''; ?>">
       </label>

        <label class="join-label" for="user_id">
        <div class="input-group">
            아이디 <input class="join-input" type="text" id="user_id" name="user_id" 
                value="<?php echo isset($_POST['user_id']) ? $_POST['user_id'] : ''; ?>">
            <button class="verification-code-button" name="duplication_verify">중복확인</button>
        </div></label>

        <?php
            if($_SESSION['is_duplication'] === 1){
                echo "<div>사용 가능한 아이디입니다!</div>";
            } else if($_SESSION['is_duplication'] === 2){
                echo "<div>아이디가 존재 합니다.</div>";
            }
        ?>

        <br>
        <label class="join-label" for="password">
            비밀번호 <input class="join-input" type="password" id="password" name="password" 
                value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
        <br></label>

        <label class="join-label" for="email">
        <div class="input-group">
            이메일 <input class="join-input" type="text" id="email" name="email" 
                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">@kku.ac.kr
            <button class="verification-code-button" name = "email_send">인증코드 보내기</button>
        </div></label>

        <?php
        if($isSend === 1)
            echo "<div> 이메일을 보냈습니다 </div>"
        ?>

        <br>
        <label class="join-label" for="verification_code">
        <div class="input-group">
            인증코드 <input class="join-input" type="text" id="verification_code" name="verification_code"
                 value="<?php if($_SESSION['isChecking'] === 1){echo " 이메일 인증이 되었습니다.";} ?>">
            <button class="verification-check-button" name="code_check">확인</button>
        </div></label>

        <?php
            if($_SESSION['isChecking'] === 2){
                echo "<div>인증코드가 일치하지 않습니다.</div>";
            }
        ?>

        <br>
        <div class="button-group">
            <button class="duplicate-check-button" type="submit" name="regist">회원가입</button>
            <div class="button-space"></div>
            <button class="duplicate-check-button" name="cancel">취소</button>
        </div>
    </form>
</body>
</html>
