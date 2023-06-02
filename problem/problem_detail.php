<?php
    session_start();
    $_SESSION['cur_page'] = 'problem_list';
    
    include '../config/dbconfig.php';

    $user_id = $_SESSION['user_id']; // 쿼리문에 사용할 id 변수

    // 문제 인덱스 가져오기
    $problemIdx = $_GET['idx'];  // GET 메소드를 통해 전달

    // 문제 정보 쿼리
    $problemQuery = "SELECT p.*, u.name AS author_name FROM problem_list AS p
                    JOIN user AS u ON u.id = p.author
                    WHERE p.idx = $problemIdx";
    $problemResult = mysqli_query($conn, $problemQuery);
    $problemData = mysqli_fetch_assoc($problemResult);

    // 댓글 정보 가져오기
    $commentQuery = "SELECT c.*, u.name AS user_name FROM comment AS c
                    JOIN user AS u ON u.id = c.user_id 
                    WHERE problem_idx = $problemIdx";
    $commentResult = mysqli_query($conn, $commentQuery);

    //정답 제출 버튼 눌렸을 시 (푼 문제 테이블에 저장, 5포인트 주기)
    if(isset($_POST['submit_answer'])){
        $IsSolved = "SELECT * FROM solved_problem WHERE user_id = '$user_id' AND problem_idx = $problemIdx";
        $IsSolvedResult = mysqli_query($conn, $IsSolved);
        if(mysqli_num_rows($IsSolvedResult) === 0){      // 이미 푼 문제인지 검사
            $user_answer = $_POST['user_answer'];  // 사용자가 입력한 정답
            if($user_answer === $problemData['answer']){ //입력한 정답과 실제 문제 답이 일치할 시
                $query = "INSERT INTO solved_problem VALUES ('$user_id', $problemIdx)";
                mysqli_query($conn, $query);             // 푼 문제 테이블에 저장
                $query = "UPDATE user SET point = point + 5 WHERE id = '$user_id'";  // 해당 유저에게 5점 추가
                mysqli_query($conn, $query);
                echo '<script>alert("정답입니다! +5점");</script>';
                echo '<script>window.location.href = "problem_list.php?subject=all";</script>';
            } else{
                echo '<script>alert("오답입니다!");</script>';
            }
        } else {
            echo '<script>alert("이미 푼 문제 입니다.");</script>';
        }
    }

    //정답 공개 버튼 눌렸을 시 (푼 문제 테이블에 저장, 포인트는 X)
    if(isset($_POST['answer_open'])){
        $query = "INSERT INTO solved_problem VALUES ('$user_id', $problemIdx)";
        mysqli_query($conn, $query); 
        echo '<script>alert("정답은 ' . $problemData['answer'] . ' 입니다!");</script>';
    }

    // 댓글 등록 버튼 눌렸을 시
    if(isset($_POST['comment_submit'])){
        $comment_content = $_POST['comment'];
        $comment_add_query = "INSERT INTO comment (user_id, problem_idx, content) VALUES('$user_id', $problemIdx, '$comment_content')";
        mysqli_query($conn, $comment_add_query);

        echo "<script>window.location.href='../problem/problem_detail.php?idx=$problemIdx'</script>";
    }

    //신고하기 눌렸을 시
    if(isset($_POST['report'])){
        // 이미 신고한 유저인지 검사
        $IsReported = "SELECT * FROM report_record WHERE user_id = '$user_id' AND problem_idx = $problemIdx";
        $IsReportedResult = mysqli_query($conn, $IsReported);
        if(mysqli_num_rows($IsReportedResult) === 0){
        $report_query = "UPDATE problem_list SET report = report + 1 WHERE idx = $problemIdx";
        mysqli_query($conn, $report_query);
        $record_query = "INSERT INTO report_record VALUES ('$user_id', $problemIdx)";
        mysqli_query($conn, $record_query);             // 신고 기록 테이블에 저장
        echo '<script>alert("신고 완료 하였습니다.");</script>';
        } else{
            echo '<script>alert("이미 신고한 문제 입니다.");</script>';
        }
    }

    // 신고 횟수 초기화 눌렸을 시
    if(isset($_POST['reset_report'])){
        // 신고 수 0으로 초기화
        $reset_query = "UPDATE problem_list SET report = 0 WHERE idx = $problemIdx";
        mysqli_query($conn, $reset_query);
        // 신고 기록 삭제
        $record_reset_query = " DELETE FROM report_record WHERE problem_idx = $problemIdx";
        mysqli_query($conn, $record_reset_query);
    }

    // 삭제 버튼 눌렸을 시
    if (isset($_POST['delete-btn'])) {
        $delete_query = "DELETE FROM problem_list WHERE idx = $problemIdx";
        mysqli_query($conn, $delete_query);

        // 테이블의 autoincrement를 1부터로 재정렬
        // 신고, 푼 문제 기록이 사라지면 안되므로 공지사항과 로직이 다름
        // 공지사항 -> 삭제 후 1부터 재삽입, 문제 -> 삭제 후 삭제한 idx 보다 높은 idx - 1 후에 autoincrement를 행 개수 + 1로 설정
        $reorder_query = "UPDATE problem_list SET idx = idx - 1 WHERE idx > $problemIdx"; // 삭제한 idx 보다 높은 idx - 1
        mysqli_query($conn, $reorder_query);
        $countQuery = "SELECT COUNT(*) AS total FROM problem_list";  
        $countResult = mysqli_query($conn, $countQuery);
        $totalCount = mysqli_fetch_assoc($countResult)['total'];       // 삭제 후 행 개수 가져오기
        $alter_query = "ALTER TABLE problem_list AUTO_INCREMENT =" . $totalCount + 1; // 행 개수 + 1로 설정
        mysqli_query($conn, $alter_query);

        echo '<script>alert("삭제 완료");</script>';
        echo "<script>window.location.href='../problem/problem_list.php?subject=all'</script>";
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>문제 풀기</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/problem_detail.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body>
    
<div class="problem-detail-container">
  <div class="problem-detail-body">

    <div class="report-buttons">
        <form method="post">
            <button class="report-button" name="report">&#128683; 신고하기</button>
        </form>
        <?php
            if($user_id === 'admin'){
                echo '<form method="post" onsubmit="return confirmReset()">';
                echo '<button type="submit" class="reset-button" name="reset_report">&#x1F504; 신고 초기화</button>';
                echo '</form>';
            }
        ?>
    </div>


    
    <div class='problem-detail-header'>
    <?php
        // 문제 정보 출력
        echo "<h2>제목: " . $problemData['title'] . "</h2>";
        echo "</div>";
        echo "<span class='problem-detail-info'>등록자: " . $problemData['author_name'] . " | 등록일자: " . $problemData['date'] . "</span><br><br>";
    ?> 
        <hr>
            <div class="problem-detail-content">
                <?php
                    echo "<h3>문제 내용</h3>";
                    echo $problemData['content'];
                ?>
            </div>
            <div class="problem-detail-choices">
                <h3>보기</h3>
            
                    <?php
                        echo "<label> 1. " . $problemData['choice1'] . "</label><br>";
                        echo "<label> 2. " . $problemData['choice2'] . "</label><br>";
                        echo "<label> 3. " . $problemData['choice3'] . "</label><br>";
                    ?>
                    <br><hr><br>
                    <form method="post">
                    <label>정답 입력: <input type="answer" name="user_answer" maxlength="100"></label>
            
            </div>

                    <br><br><br>
                    <div class="problem-detail-buttons">
                    <div>  <!-- 렌더링 버그 방지용 -->
                        <button class="submit-button" name="submit_answer">정답 제출</button>
                    </div>
                    </form>
                    
                    <form method="post" action="problem_list.php?subject=all">
                       <button class="reveal-button">목록으로</button>
                    </form>
                    <?php
                        if($user_id === $problemData['author'] || $user_id === 'admin'){
                            echo '<form method="post" onsubmit="return confirmDelete()">';
                            echo '<button type="submit" class="delete-button" name="delete-btn">삭제하기</button>';
                            echo '</form>';
                        }
                    ?>
                    <div>
                        <form method="post">
                            <button class="additional-button" name="answer_open">정답 공개</button>
                        </form>
                    </div>
                    </div>
               
        </div>

        <br><br><br><br><br><br>
        <form method="post">
        <div class="problem-detail-comment-section">
        
            <label for="comment-input">댓글 내용</label>
            <br>
            <textarea id="comment-input" class="comment-textarea" name="comment" maxlength="100"></textarea>
            <br>
            <button type="submit" class="comment-submit-button" name="comment_submit">댓글 등록</button>
        </form>
        <br>
            <div class="problem-detail-comment-list">
                <ul>
                    <?php
                    while ($commentData = mysqli_fetch_assoc($commentResult)) {
                        echo "<li>";
                        echo "<span class='comment-author'>작성자: " . $commentData['user_name'] . " | </span>";
                        echo "<span class='comment-date'> 작성일자: " . $commentData['date'] . "</span>";
                        echo "<p class='comment-content'>" . $commentData['content'] . "</p>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm("정말로 삭제하시겠습니까?");
        }

        function confirmReset() {
            return confirm("정말로 초기화하시겠습니까?");
        }
    </script>
</body>
</html>
