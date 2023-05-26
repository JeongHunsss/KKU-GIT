<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/top_bar.css">
    <title>topbar</title>
</head>
<body class="top_body">
    <div class="top-bar">
        <div class="logo" onclick="location.href='../main/main.php'">
            <h2>KKU-GIT</h2>
        </div>
        <div class="menu">
            <div class="link
                <?php echo ($_SESSION['cur_page'] === 'notice') ? 'current-page' : ''; ?>" 
                onclick="location.href='../notice/notice_list.php'">
                공지사항 테스트용
            </div>
            <div class="link 
                <?php echo ($_SESSION['cur_page'] === 'problem_add') ? 'current-page' : ''; ?>"
                onclick="location.href='../problem/problem_add.php'">
                문제 등록
            </div>
            <div class="link 
                <?php echo ($_SESSION['cur_page'] === 'problem_list') ? 'current-page' : ''; ?>" 
                onclick="location.href='../problem/problem_list.php'">
                문제 리스트
            </div>
        </div> 
        <div class="user-info">
            <?php
                echo "<a href='../my_info/my_page.php'><strong class='strong-name'>".$_SESSION['name']."</strong></a>님 반갑습니다.";
            ?>
            <a href="../login/login.php" class="logout-btn">로그아웃</a>
        </div>
    </div>
</body>

</html>