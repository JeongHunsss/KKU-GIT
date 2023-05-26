<!DOCTYPE html>
<html>
<head>
    <title>문제 풀기 페이지</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/problem_detail.css">
    <link rel="stylesheet" type="text/css" href="./css/problem_add.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body> 
    <div class="container">
        <h1>문제 풀기 페이지</h1>
        <div class="problem-header">
            <h2>제목: ~~~~~~~</h2>
        </div>
        <br>
        <span>등록자: 한유림 | 등록일자: 2022-05-10</span><br><br>
        <div class="problem-body">
            <div class="problem-content">
                <h3>문제 내용</h3><br><br><br><br>
            </div>
            <div class="problem-choices">
                <h3>보기</h3>
                <form>
                    <label> 1. 1번 정답 내용</label>
                    <label> 2. 2번 정답 내용</label>
                    <label> 3. 3번 정답 내용</label>
                    <br>
                    <label>정답 입력: <input type="text"></label>
                </form>
            </div>
            <div class="problem-buttons">
                <button>정답 제출</button>
                <button>정답 공개</button>
            </div>
        </div>

        <br><br><br><br><br><br>
        <hr>
        <div class="comment-section">
            <h3>댓글</h3>
            <form>
                <label>댓글 내용</label>
                <br>
                <textarea rows="4" cols="50"></textarea>
                <button type="submit">댓글 등록</button>

                <label>작성자: <input type="text"></label>
            </form>
            <div class="comment-list">
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