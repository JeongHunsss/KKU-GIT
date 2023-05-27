<?php
    session_start();
    $_SESSION['cur_page'] = 'main';
    include '../config/dbconfig.php';

    // 공지사항 데이터 가져오기
    $notice_query = "SELECT n.idx, n.title, u.name AS author_name, n.date
                FROM notice AS n
                JOIN user AS u ON n.author = u.id
                ORDER BY n.idx DESC
                LIMIT 5";
    $notice_result = mysqli_query($conn, $notice_query);
    if (!$notice_result) {
        $notice_no_result = '공지사항이 없습니다.';
    }    

    // 랭킹 데이터 가져오기
    $rank_query = "SELECT name, grade, point
                FROM user
                WHERE grade != 'admin'
                ORDER BY point DESC
                LIMIT 10";
    $rank_result = mysqli_query($conn, $rank_query);
    if (!$rank_result) {
        $rank_no_result = '랭킹 데이터가 없습니다.';
    }

    // 최근 등록 문제 데이터 가져오기
    $problem_query = "SELECT p.idx, p.subject, p.title, u.name AS author_name, p.date
                                FROM problem_list AS p
                                JOIN user AS u ON p.author = u.id
                                ORDER BY p.idx DESC
                                LIMIT 16";
    $problem_result = mysqli_query($conn, $problem_query);
    if (!$problem_result) {
        $problem_no_result = '최근 등록 문제가 없습니다.';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>KKU-GIT</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
        <link rel="stylesheet" type="text/css" href="./css/main.css">
        <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    </head>
    <?php include '../bars/top_bar.php'; ?>
    <body>
        <div class="banner">
            <img src="../img/banner.PNG" alt="Banner" class="banner-img active">
            <img src="../img/banner2.PNG" alt="Banner 2" class="banner-img inactive">
            <img src="../img/banner3.PNG" alt="Banner 3" class="banner-img inactive">
        </div>

        <div class="content-wrapper">
            <div class="notice-box">
                <h2>공지사항</h2>
                <?php
                    if(!$notice_result){
                        echo $notice_no_result;
                    }else{
                    echo '<table class="notice-table">';
                        echo '<thead>';
                           echo '<tr>';
                            echo '<th class="idx-col">번호</th>';
                                echo '<th class="title-col">제목</th>';
                                echo '<th class="author-col">작성자</th>';
                                echo '<th class="date-col">등록일자</th>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while ($notice_row = mysqli_fetch_assoc($notice_result)) {
                            echo "<tr>";
                            echo "<td>" . $notice_row['idx'] . "</td>";
                            echo "<td>" . $notice_row['title'] . "</td>";
                            echo "<td>" . $notice_row['author_name'] . "</td>";
                            echo "<td>" . $notice_row['date'] . "</td>";
                            echo "</tr>";
                        }
                        echo '</tbody>';
                        echo '</table>';
                    }
                ?>
                <div class="more-btn" onclick="location.href='../notice/notice_list.php'">더보기+</div>
            </div>

            <div class="rank-box">
                <h2>랭킹</h2>
                <?php
                    if(!$rank_result){
                        echo $rank_no_result;
                    }else{
                        echo '<table class="transparent-table">';
                            echo '<thead>';
                                echo '<tr>';
                                    echo '<th>순위</th>';
                                    echo '<th>이름(등급)</th>';
                                    echo '<th>포인트</th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                                $rank = 1;
                                while ($rank_row = mysqli_fetch_assoc($rank_result)) {
                                    if($rank == 1){
                                        echo '<tr class="first_rank">';
                                    }else if($rank == 2){
                                        echo '<tr class="second_rank">';
                                    }else if($rank == 3){
                                        echo '<tr class="third_rank">';
                                    }else{
                                        echo '<tr>';
                                    }
                                    echo "<td>" . $rank . "</td>";
                                    echo "<td>" . $rank_row['name'] . " (" . $rank_row['grade'] . ")</td>";
                                    echo "<td>" . $rank_row['point'] . "</td>";
                                    echo "</tr>";
                                    $rank++;
                                }
                            echo '</tbody>';
                        echo '</table>';
                    }
                ?>            
            </div>

            <div class="recent-problem-box">
                <h2>최근 등록 문제</h2>
                <?php
                    if (!$problem_result) {
                        echo $problem_no_result;
                    }else{
                        echo '<table class="recent-problem-table">';
                            echo '<thead>';
                                echo '<tr>';
                                    echo '<th class="idx-col">등록번호</th>';
                                    echo '<th class="subject-col">과목</th>';
                                    echo '<th class="title-col">제목</th>';
                                    echo '<th class="author-col">등록자</th>';
                                    echo '<th class="date-col">등록일자</th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                        while ($problem_row = mysqli_fetch_assoc($problem_result)) {
                            echo "<tr>";
                            echo "<td>" . $problem_row['idx'] . "</td>";
                            echo "<td>" . $problem_row['subject'] . "</td>";
                            echo "<td>" . $problem_row['title'] . "</td>";
                            echo "<td>" . $problem_row['author_name'] . "</td>";
                            echo "<td>" . $problem_row['date'] . "</td>";
                            echo "</tr>";
                        }
                        echo '</tbody>';
                        echo '</table>';
                    }
                ?>
                <div class="more-btn" onclick="location.href='../problem/problem_list.php'">더보기+</div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                var currentIndex = 0;
                var images = $('.banner-img');
                var totalImages = images.length;

                function showImage(index) {
                    images.removeClass('active').addClass('inactive');
                    images.eq(index).removeClass('inactive').addClass('active');
                }

                function nextImage() {
                    currentIndex++;
                    if (currentIndex >= totalImages) {
                        currentIndex = 0;
                    }
                    showImage(currentIndex);
                }

                setInterval(nextImage, 3000); 
            });
        </script>
            
    </body>
</html>

<?php
    // 데이터베이스 연결 종료
    mysqli_close($conn);
?>