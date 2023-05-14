<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/quizlistpage.css">
    <title>문제 리스트 페이지</title>
</head>
<body>
    <h1>문제 리스트 페이지</h1>
    <form method="get" action="">
        <label for="subject">과목 검색 
        <input type="text" name="subject" id="subject">
        <input type="submit" value="검색"></label>
    </form>

    <form method="get" action="quizregister.php" style="float:right; margin-right:0px;">
        <input type="submit" value="문제 등록">
    </form>
    
    <table>
        <thead>
            <tr>
                <th>번호</th>
                <th>과목</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>999</td>
                <td>데이터베이스</td>
                <td>~~~~~~~~~~~~~~~~~</td>
                <td>한유림</td>
                <td>2022-05-05</td>
            </tr>
            <tr>
                <td>998</td>
                <td>운영체제</td>
                <td>~~~~~~~~~~~~~~~~~~</td>
                <td>심유정</td>
                <td>2022-05-04</td>
            </tr>
            <tr>
                <td>997</td>
                <td>빅데이터 기초</td>
                <td>~~~~~~~~~~~~~~~~~~</td>
                <td>박정훈</td>
                <td>2022-05-03</td>
            </tr>
        </tbody>
    </table>
    
    <br>
    
    <div class="pagination">
        <div class="pagination-box">
            <a href="#"><<</a>
            <a href="#"><</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">></a>
            <a href="#">>></a>
        </div>
    </div>

</body>
</html>
