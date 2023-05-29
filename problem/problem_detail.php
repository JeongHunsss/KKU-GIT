<?php
    session_start();
    $_SESSION['cur_page'] = 'problem_list';
    include '../config/dbconfig.php';

    $user_id = $_SESSION['user_id']; // 쿼리문에 사용할 id 변수

    // 문제 정보 가져오기
    $problemIdx = $_GET['idx'];  // GET 메소드를 통해 전달

    // 문제 정보 조회 쿼리
    $problemQuery = "SELECT * FROM problem_list WHERE idx = $problemIdx";
    $problemResult = mysqli_query($conn, $problemQuery);
    $problemData = mysqli_fetch_assoc($problemResult);

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
                echo '<script>alert("정답입니다!");</script>';
                echo '<script>window.location.href = "problem_list.php";</script>';
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
      <div>
        <button class="report-button">&#x26D4; 신고하기</button>
        <button class="reset-button">&#x1F504; 신고 초기화</button>
      </div>
    </div>


    
    <div class='problem-detail-header'>
    <?php
        // 문제 정보 출력
        echo "<h2>제목: " . $problemData['title'] . "</h2>";
        echo "</div>";
        echo "<span class='problem-detail-info'>등록자: " . $problemData['author'] . " | 등록일자: " . $problemData['date'] . "</span><br><br>";
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
                    <label>정답 입력: <input type="text" name="user_answer"></label>
            
            </div>

                    <br><br><br>
                    <div class="problem-detail-buttons">
                
                    <button class="submit-button" name="submit_answer">정답 제출</button>
                    
                    <div class="reveal-button" onclick="location.href='../problem/problem_list.php'">목록으로</div>
                    <button class="additional-button" name="answer_open">정답 공개</button>
                    </div>
                </form>
        </div>

        <br><br><br><br><br><br>

        <div class="problem-detail-comment-section">
  <form>
    <label for="comment-input">댓글 내용</label>
    <br>
    <textarea id="comment-input" class="comment-textarea"></textarea>
    <br>
    <button type="submit" class="comment-submit-button">댓글 등록</button>
  </form>
  <br>

            
            <div class="problem-detail-comment-list">
                <ul>
                    <li>
                        <span class="comment-author">작성자: 한유림 | </span>
                        <span class="comment-date"> 작성일자: 2023.05.14</span>
                        <p class="comment-content">파이팅!</p>
                    </li>
                    <li>
                        <span class="comment-author">작성자: 심유정 | </span>
                        <span class="comment-date"> 작성일자: 2023.05.13</span>
                        <p class="comment-content">메롱!</p>
                    </li>
                    <li>
                        <span class="comment-author">작성자: 박정훈 | </span>
                        <span class="comment-date"> 작성일자: 2023.05.12</span>
                        <p class="comment-content">냥!</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>
