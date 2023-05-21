<!DOCTYPE html>
<html>
<head>
<title>문제 풀기 페이지</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/detail.css">
    <link rel="stylesheet" type="text/css" href="./css/quizregister.css">
</head>
<body>
    
    <div class="container">
    <br><h3>문제 풀기 페이지</h3>
        <div class="problem-header">
            <h2> 문제 제목: ~~~~~~~</h2>
            <span> 등록자: 한유림 | 등록일자: 2022-05-10</span>
        </div>
        <br>
       
        <div class="problem-body">
            <div class="problem-content">
                <h3> 문제 내용</h3>
            </div>
            <div class="problem-choices">
                <h3>보기</h3>
                <form>
                    <label> 1. 1번 정답 내용</label><br>
                    <label> 2. 2번 정답 내용</label><br>
                    <label> 3. 3번 정답 내용</label><br><br><br>
                 
                    <label>정답 입력: <input type="text"></label>
                </form>
            
            <div class="problem-buttons">
                <button>정답 제출</button>
                <button>정답 공개</button>
            </div>
       

     
        <hr>
        <div class="comment-section">
            
            <h3>댓글</h3>
            
           
            <form>
                <label>댓글 내용</label>
                <br>
                <textarea rows="4" cols="50"></textarea>
                <button type="submit">댓글 등록</button><br>
                <label>작성자: <input type="text"></label>

            </form>
            <div class="comment-list">
                <ul>
                    <li>
                        <span class="comment-author">작성자: 한유림 | </span>
                        <span class="comment-date"> 작성일자: 2023.05.14</span>
                        <p class="comment-content">파이팅!</p>
                    </li>  
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
