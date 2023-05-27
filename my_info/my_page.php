<?php
    session_start();
    $_SESSION['cur_page'] = 'my_page';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>마이페이지</title>
        <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
        <link rel="stylesheet" type="text/css" href="./css/my_page.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    </head> 
    <body>
        <?php include '../bars/top_bar.php'; ?>  

        <div class="wrap">
        <div class="orangeContainer">
            <div>
            <div class="grade">GOLD<i class="fas fa-crown crown-icon"></i></div>
            <div class="name">id</div>
            </div>       
        </div>
        <div class="problemContainer">
            <a href="re_problem.php" class="item">
                <div class="number">30</div>
                <div>등록문제</div>
            </a>
            <a href="sol_problem.php" class="item">
                <div class="number">10</div>
                <div>푼 문제</div>
            </a>
            <div class="item2">
                <div class="number2">비밀번호 변경</div>
                <div>
                <form action="" method="post">
                            <label for="current_password">현재 비밀번호</label><br>
                            <input type="password" id="current_password" name="current_password"><br><br>
                            <label for="new_password">새 비밀번호</label><br>
                            <input type="password" id="new_password" name="new_password"><br><br>
                            <label for="confirm_new_password">새 비밀번호 확인</label><br>
                            <input type="password" id="confirm_new_password" name="confirm_new_password">
                            <input type="submit" value="변경">
                </div>
            </div>
        </div>
        </div>


  </body>
</html>