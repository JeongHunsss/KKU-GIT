<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>마이페이지</title>
        <link rel="stylesheet" type="text/css" href="../bars/sidebar.css">
        <link rel="stylesheet" type="text/css" href="../bars/topbar.css">
        <link rel="stylesheet" type="text/css" href="./css/mypage.css">
    </head> 
    <body>
        <!-- <div class="cont"> -->
            <div class="sidebar">
                <?php include '../bars/sidebar.php'; ?>
            </div>
            
                <?php include '../bars/topbar.php'; ?>
            
                <div class="container">
                    <h1>마이페이지</h1>
                    <!-- <hr class="my-hr"> -->
                    <div class="user-infom">
                        <p>사용자 이름 : 심유정</p>
                        <p>아이디 : YJ</p>
                        <!-- <hr class="my-hr"> -->
                        <form action="" method="post">
                            <label for="current_password">현재 비밀번호:</label>
                            <input type="password" id="current_password" name="current_password"><br><br>
                            <label for="new_password">새 비밀번호:</label>
                            <input type="password" id="new_password" name="new_password"><br><br>
                            <label for="confirm_new_password">새 비밀번호 확인:</label>
                            <input type="password" id="confirm_new_password" name="confirm_new_password">
                            <input type="submit" value="변경">
                        </form>
                        <!-- <hr class="my-hr"> -->
                        <p>등록 문제 : 3</p>  
                        <p>푼 문제 : 3</p>
                    </div>
                </div>
        <!-- </div> -->
    </body>
</html>
