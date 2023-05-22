<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>푼 문제 내역</title>
        <link rel="stylesheet" type="text/css" href="../bars/css/side_bar.css">
        <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
        <link rel="stylesheet" type="text/css" href="./css/my_page.css">
    </head> 
    <body>
    <div class="cont">
            <div class="sidebar">
                <?php include '../bars/side_bar.php'; ?>
            </div>
<<<<<<< HEAD:mypage/sol_problem.php
            <div class="header-wrapper">
                <?php include '../header.php'; ?>
=======
            <header>
                <?php include '../bars/top_bar.php'; ?>
>>>>>>> 76537d27912d612d1ff05c3fd78892fa7c56e9bf:my_info/sol_problem.php
                <hr class="my-hr">
            </div>
            <div class="title">
                <h1>푼 문제 내역</h1>
            </div>

            <div class="container">
            <table>
                <thead>
                <tr>
                    <th>번호</th>
                    <th>과목</th>
                    <th>제목</th>
                    <th>등록자</th>
                    <th>등록일자</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>자료구조</td>
                    <td>스택 구현하기</td>
                    <td>홍길동</td>
                    <td>2022-05-10</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>알고리즘</td>
                    <td>퀵 정렬 구현하기</td>
                    <td>김철수</td>
                    <td>2022-05-11</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>데이터베이스</td>
                    <td>텀프 우리가 짱 먹음</td>
                    <td>유 정</td>
                    <td>2022-05-11</td>
                </tr>
            
                <!-- 다른 문제들의 정보를 추가 -->

                </tbody>
            </table>
            </div>
            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">&raquo;</a>
            </div>
    </div>
</body>
</html>