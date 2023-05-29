<?php
session_start();
$_SESSION['cur_page'] = 'problem_list';
?>
<!DOCTYPE html>
<html>
<head>
    <title>문제 리스트</title>
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


            <div class="problem-detail-header">
                <h2>제목: 데이터베이스 sql 관련</h2>
            </div>
            <span class="problem-detail-info">등록자: 한유림 | 등록일자: 2022-05-10</span><br><br>
            <hr>
            <div class="problem-detail-content">
                <h3>문제 내용</h3><br><br>
            </div>
            <div class="problem-detail-choices">
                <h3>보기</h3>
                <form>
                    <label> 1. mysql</label><br>
                    <label> 2. database</label><br>
                    <label> 3. sql</label><br>
                    <br><hr><br>
                    <label>정답 입력: <input type="text"></label>
                </form>
            </div>

            <br><br><br>
            <div class="problem-detail-buttons">
            <button class="submit-button">정답 제출</button>
            <button class="reveal-button" onclick="goBack()">뒤로가기</button>
            <button class="additional-button">정답 공개</button>
            </div>
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

    <script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>
