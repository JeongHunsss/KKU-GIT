<?php
    session_start(); 
?>

<!DOCTYPE html>
<html>
<header>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/top_bar.css">
    <title>topbar</title>
    <div class="top-bar">
        <div class="menu">
            <h2><a href="../main/main.php">KKU-GIT </a></h2>
            <div class="navi">
            <a href="../notice/notice_list.php">공지사항</a>
            <a href="../problem/problem_add.php">문제 등록</a>
            <a href="../problem/problem_list.php">문제 리스트</a>
            </div>
        </div>   
        <div class="user-info">
            <?php
                echo "<a href='../my_info/my_page.php'><strong>".$_SESSION['name']."</strong></a>님 반갑습니다.";
            ?>
            <a href="../login/login.php" class="logout-btn">로그아웃</a>
        </div>
    </div>
</header>

</html>