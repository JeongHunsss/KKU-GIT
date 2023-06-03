<?php
session_start();

include '../config/dbconfig.php';

// 초기화
$isSend = 0; // 메일 보내기 성공 여부
if (!isset($_SESSION['is_duplication'])) {    // 아이디 중복확인 여부
    $_SESSION['is_duplication'] = 0;
}

if (!isset($_SESSION['isChecking'])) {    // 이메일 인증 여부
    $_SESSION['isChecking'] = 0;
}

// 회원가입 버튼 눌렸을 시
if (isset($_POST['regist'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $user_name = $_POST['user_name'];
    if ($user_id) {
        if ($password) {
            if ($user_name) {
                if ($_SESSION['isChecking'] === 1 and $_SESSION['is_duplication'] === 1) {

                    // 데이터베이스에 회원 정보 저장
                    $query = "INSERT INTO user (id, password, name) VALUES ('$user_id', '$password', '$user_name')";
                    mysqli_query($conn, $query);

                    // 세션변수 무작위로 변경 이메일 코드 입력창은 최대 5글자 제한이므로 6글자의 코드로 초기화
                    $code = rand(100000, 999999);
                    $_SESSION['verification_code'] = $code;
                    $_SESSION['is_duplication'] = $code;
                    $_SESSION['isChecking'] = $code;

                    echo '<script>alert("회원가입이 완료되었습니다.");</script>';
                    // 회원가입 완료 후 홈페이지로 이동
                    echo '<script>window.location.href = "login.php";</script>';
                    exit();
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

// 취소 버튼 누를 시
if (isset($_POST['cancel'])) {
    // 세션변수 무작위로 변경
    $code = rand(100000, 999999);
    $_SESSION['verification_code'] = $code;
    $_SESSION['is_duplication'] = $code;
    $_SESSION['isChecking'] = $code;
    echo '<script>window.location.href = "login.php";</script>';
}

// 아이디 중복 확인
if (isset($_POST['duplication_verify'])) {
    $user_id = $_POST['user_id'];

    // 아이디 확인
    $query = "SELECT id FROM user WHERE id='$user_id'";
    $id_search = mysqli_query($conn, $query);

    if (mysqli_num_rows($id_search) === 0) {  // 중복되는 아이디 없음
        $_SESSION['is_duplication'] = 1;
    } else {    // 중복되는 아이디 있음
        $_SESSION['is_duplication'] = 2;
    }
}

// 이메일 전송
if (isset($_POST['email_send'])) {
    $receiver_email = $_POST['email'].'@kku.ac.kr';
    $code = rand(10000, 99999);
    $_SESSION['verification_code'] = $code; // 세션에 인증 코드 저장
    include '../config/mailerconfig.php';
}

// 인증코드 확인
if (isset($_POST['code_check'])) {
    $input_verification_code = $_POST['verification_code'];
    if ($input_verification_code == $_SESSION['verification_code']) {
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
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
</head>
<body class="join-body">
    <form method="post" class="join-form">
        <h2>KKU-GIT 회원가입</h2>
    
        <label class="join-label" for="user_name">이름 </label>
        <input class="join-input" type="text" id="user_name" name="user_name" 
            maxlength="10" value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : ''; ?>">
                
        <label class="join-label" for="user_id">아이디
            <?php
                if ($_SESSION['is_duplication'] === 1) {
                    echo "<div class='isOK' >사용 가능한 아이디입니다!</div>";
                } else if ($_SESSION['is_duplication'] === 2) {
                    echo "<div class='isNotOK' >아이디가 존재합니다.</div>";
                }
            ?>
        </label>
        
        <div class="input-group">
            <input class="join-input" type="text" id="user_id" name="user_id" 
                value="<?php echo isset($_POST['user_id']) ? $_POST['user_id'] : ''; ?>"
                maxlength="10" pattern="[A-Za-z0-9]{1,10}" placeholder="영어, 숫자만 입력(최대 10자)">
            <button class="verification-code-button" name="duplication_verify">중복확인</button>
        </div>
        

        <!-- <br> -->
        <label class="join-label" for="password">비밀번호 </label>
            <input class="join-input" type="password" id="password" name="password" 
                value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"
                maxlength="20" pattern="[^\sㄱ-ㅎㅏ-ㅣ가-힣]{1,20}" placeholder="한글 사용 불가(최대 20자)">
        

        <label class="join-label" for="email">이메일
            <?php
            if ($isSend === 1) {
                echo "<div class='isOK'> 이메일을 보냈습니다 </div>";
            }
            ?>
        </label>
        <div class="input-group">
             <input class="join-input" type="text" id="email" name="email" 
                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"><span class="kku_mail">@kku.ac.kr</span>
            <button class="verification-code-button" name="email_send">인증코드 받기</button>
        </div>
        
        <label class="join-label" for="verification_code">인증코드
            <?php
                if ($_SESSION['isChecking'] === 2) {
                    echo "<div class='isNotOK'>인증코드가 일치하지 않습니다.</div>";
                }
            ?>
        </label>
        <div class="input-group">
             <input class="join-input" type="text" id="verification_code" name="verification_code"
              maxlength="5" value="<?php if ($_SESSION['isChecking'] === 1) {echo " 이메일 인증이 되었습니다.";} ?>">
            <button class="verification-check-button" name="code_check">확인</button>
        </div>

        <div class="button-group">
            <button class="verification-check-button" type="submit" name="regist">회원가입</button>
        </form>
            <div class="button-space"></div>
            <button class="cancel-button" name="cancel">취소</button>
        </div>
</body>
</html>