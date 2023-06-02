<?php
    session_start();
    $_SESSION['cur_page'] = 'notice';
    include '../config/dbconfig.php';

    // 글 인덱스 가져오기
    $noticeIdx = $_GET['idx'];  // GET 메소드를 통해 전달

    // 글 정보 쿼리
    $noticeQuery = "SELECT n.*, u.name AS author_name FROM notice AS n
                    JOIN user AS u ON u.id = n.author
                    WHERE n.idx = $noticeIdx";
    $noticeResult = mysqli_query($conn, $noticeQuery);
    $noticeData = mysqli_fetch_assoc($noticeResult);

    // 삭제 버튼이 눌렸을 때
    if (isset($_POST['delete-btn'])) {
        $delete_query = "DELETE FROM notice WHERE idx = $noticeIdx";
        mysqli_query($conn, $delete_query);

        // 데이터 백업
        $backup_query = "SELECT * FROM notice";
        $backup_result = mysqli_query($conn, $backup_query);

        // 테이블의 autoincrement를 1부터로 재정렬
        $reorder_query = "DELETE FROM notice";    // TRUNCATE는 외래키 제약조건 때문에 실행X
        mysqli_query($conn, $reorder_query);
        $alter_query = "ALTER TABLE notice AUTO_INCREMENT = 1";
        mysqli_query($conn, $alter_query);

        // 백업된 데이터를 다시 삽입
        while ($row = mysqli_fetch_assoc($backup_result)) {
            $insert_query = "INSERT INTO notice (title, content, author, date)
                            VALUES ('$row[title]', '$row[content]', '$row[author]', '$row[date]')";
            mysqli_query($conn, $insert_query);
        }

        echo '<script>alert("삭제 완료");</script>';
        echo "<script>window.location.href='../notice/notice_list.php?title=all'</script>";
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>공지사항 상세보기</title>
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
	<link rel="stylesheet" type="text/css" href="./css/notice_detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-wzYS8v63e6sH2iITBn4xh6lAxfA+ar9viq//NgyOESoClafnHErjOSw5XPebHE9PLbXOrzPTzMgTJYqJS0VKbA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<?php include '../bars/top_bar.php'; ?>

<body>
    <div class="cont">
    <h1 class="detail_tit">공지사항 상세보기</h1>
        <div class="detail_container">
            <div class="detail_notice">
                <div class="detail_title">
                    <?php
                        echo '<h2 class="detail-h2">'.$noticeData['title'].'</h2>';
                    ?>
                </div>
                <div class="detail_info">
                    <?php
                        echo '<p>작성일 ' . $noticeData['date'] . ' | 작성자 ' . $noticeData['author_name'] . '</p>'; 
                    ?>
                </div>
                <div class="detail_content">
                    <?php
                        echo '<p class="cnt">' . $noticeData['content'] . '</p>';
                    ?>
                </div>
            </div>
            <div class="notice_button">
                <button class="reveal-button" onclick="location.href='notice_list.php?title=all'">목록으로</button>
                <?php
                    if($_SESSION['user_id'] === 'admin'){
                        echo '<form class="button-form" method="post" action="notice_add.php?idx=' . $noticeData['idx'] . '">';
                        echo '<button type="submit" class="edit-button">수정</button>';
                        echo '</form>';
                        echo '<form class="button-form" method="post" onsubmit="return confirmDelete()">';
                        echo '<button type="submit" class="delete-button" name="delete-btn">삭제</button>';
                        echo '</form>';
                    }
                ?>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("정말로 삭제하시겠습니까?");
        }
    </script>
</body>
</html>