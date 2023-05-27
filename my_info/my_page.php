<?php
    session_start();
    $_SESSION['cur_page'] = 'my_page';

    include '../config/dbconfig.php';

    //유저 정보 가져오기
    $query_id = $_SESSION['user_id'];
    $info_query = "SELECT * FROM user WHERE id = '$query_id'";
    $info_result = mysqli_query($conn, $info_query);
    $info_row = mysqli_fetch_assoc($info_result);
    $user_grade = $info_row['grade'];
    $user_point = $info_row['point'];
    $user_pw = $info_row['password'];

    //유저 랭킹 정보 가져오기
    $rank_info_query = "SELECT COUNT(*) FROM user WHERE point > (SELECT point FROM user WHERE id = '$query_id')";
    $rank_info_result = mysqli_query($conn, $rank_info_query);
    $my_rank = mysqli_fetch_assoc($rank_info_result);

    //등록 문제 정보 가져오기
    $reg_pro_info_query = "SELECT COUNT(*) FROM problem_list WHERE author = '$query_id'";
    $reg_pro_info_result = mysqli_query($conn, $reg_pro_info_query);
    $my_problem = mysqli_fetch_assoc($reg_pro_info_result);
    
    //푼 문제 정보 가져오기
    $sol_pro_info_query = "SELECT COUNT(*) FROM solved_problem WHERE user_id = '$query_id'";
    $sol_pro_info_result = mysqli_query($conn, $sol_pro_info_query);
    $my_sol_problem = mysqli_fetch_assoc($sol_pro_info_result);

    // 비밀번호 변경
    if (isset($_POST['new_password']) && isset($_POST['confirm_new_password'])) {
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];

        // 새 비밀번호와 새 비밀번호 확인이 일치하는지 확인
        if ($new_password == $confirm_new_password) {
            // 비밀번호 업데이트
            $update_pw_query = "UPDATE user SET password = '$new_password' WHERE id = '$query_id'";
            mysqli_query($conn, $update_pw_query);

            // 비밀번호 변경 성공
            echo "<script> alert('비밀번호가 성공적으로 변경되었습니다.');</script>";
        } else {
            // 새 비밀번호와 새 비밀번호 확인 불일치
            echo "<script> alert('새 비밀번호와 새 비밀번호 확인이 일치하지 않습니다.');</script>";
        }
    }

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
            <?php
                if($info_row['grade'] == 'gold'){
                    echo '<div class="GoldContainer">';
                        echo '<div>';
                        echo '<div class="grade">GOLD<i class="fas fa-medal gold-medal"></i> ('.(implode($my_rank) + 1).'위) / ['.$user_point.'point]</div>';
                        echo '<div class="name">' . $_SESSION['user_id'] . '</div>';
                        echo '</div>';       
                    echo '</div>';
                }else if($info_row['grade'] == 'silver'){
                    echo '<div class="SilverContainer">';
                        echo '<div>';
                        echo '<div class="grade">SILVER<i class="fas fa-medal silver-medal"></i> ('.(implode($my_rank) + 1).'위) / ['.$user_point.'point]</div>';
                        echo '<div class="name">' . $_SESSION['user_id'] . '</div>';
                        echo '</div>';       
                    echo '</div>';
                }else if($info_row['grade'] == 'bronze'){
                    echo '<div class="BronzeContainer">';
                        echo '<div>';
                        echo '<div class="grade">BRONZE<i class="fas fa-medal bronze-medal"></i> ('.(implode($my_rank) + 1).'위) / ['.$user_point.'point]</div>';
                        echo '<div class="name">' . $_SESSION['user_id'] . '</div>';
                        echo '</div>';
                    echo '</div>';
                }else if($user_grade == 'admin'){
                    echo '<div class="AdminContainer">';
                        echo '<div>';
                        echo '<div class="grade">ADMIN<i class="fas fa-crown crown-icon"></i></div>';
                        echo '<div class="name">' . $_SESSION['user_id'] . '</div>';
                        echo '</div>';
                    echo '</div>';                    
                }
            ?>
        <div class="problemContainer">
            <a href="re_problem.php" class="item">
                <div class="number"><?php echo implode($my_problem) ?></div>
                <div>등록문제</div>
            </a>
            <a href="sol_problem.php" class="item">
                <div class="number"><?php echo implode($my_sol_problem) ?></div>
                <div>푼 문제</div>
            </a>
            <div class="item2">
                <div class="number2">비밀번호 변경</div>
                <div>
                <form action="" method="post">
                    <label for="current_password">현재 비밀번호</label><br>
                    <input type="password" id="current_password" name="current_password">
                    <input class="change-btn" type="submit" value="확인"><br><br>
                </form>
                <form action="" method="post">
                    <?php
                        // 현재 비밀번호 일치 시 새 비밀번호 입력창 렌더링
                        if (isset($_POST['current_password']) && $_POST['current_password'] == $info_row['password']) {
                            echo '<label for="new_password">새 비밀번호</label><br>';
                            echo '<input type="password" id="new_password" name="new_password"><br><br>';
                            echo '<label for="confirm_new_password">새 비밀번호 확인</label><br>';
                            echo '<input type="password" id="confirm_new_password" name="confirm_new_password">';
                            echo '<input class="change-btn" type="submit" value="변경">';
                        }
                        // 현재 비밀번호 불일치
                        if (isset($_POST['current_password']) && $_POST['current_password'] != $info_row['password']) {
                            echo "<script> alert('현재 비밀번호가 일치하지 않습니다.');</script>";
                        }
                    ?>
                </form>
            </div>
            </div>
        </div>
    </div>


  </body>
</html>