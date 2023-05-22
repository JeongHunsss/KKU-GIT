<?php
    session_start(); 
?>

<!DOCTYPE html>
<html>
<header>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/top_bar.css">
    <title>topbar</title>
    
    
    <div class="user-info">
        <?php
            echo "<a href='../my_info/my_page.php'><strong>".$_SESSION['name']."</strong></a>님 반갑습니다.";
        ?>
        <a href="../login/login.php" class="logout-btn">로그아웃</a>
    </div>
    <hr class="topbar-hr">
</header>

</html>