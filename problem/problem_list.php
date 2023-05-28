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
    <link rel="stylesheet" type="text/css" href="./css/problem_list.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body>
    <div class="container">
        <h1 class="problem_title">문제 리스트</h1>
        <div class="problem_container">
            <form method="get" action="" class="search-form">
                <!-- <label class="sub_title" for="subject">과목 검색</label> -->
                <input type="text" name="subject" id="subject">
                <button type="submit" class="search-btn">과목 검색</button>
            </form>

            <form method="get" action="problem_add.php" class="submit-form">
                <input type="submit" value="문제 등록" class="submit-btn">
            </form>
        </div>   

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
                        <td>0001</td>
                        <td>데이터베이스</td>
                        <td>mysql 설치 방법</td>
                        <td>간미연</td>
                        <td>2023-05-13</td>
                    </tr>
                    <tr>
                        <td>0002</td>
                        <td>운영체제</td>
                        <td>운영체제 용어 정리</td>
                        <td>유지민</td>
                        <td>2023-05-13</td>
                    </tr>
                    <tr>
                        <td>0003</td>
                        <td>컴퓨터알고리즘</td>
                        <td>컴퓨터알고리즘 구조</td>
                        <td>송강호</td>
                        <td>2023-05-12</td>
                    </tr>
                    <tr>
                        <td>0004</td>
                        <td>빅데이터 기초</td>
                        <td>서울통계사이트 웹크롤링</td>
                        <td>임강원</td>
                        <td>2023-05-11</td>
                    </tr>
                    <tr>
                        <td>0005</td>
                        <td>대학수학</td>
                        <td>sin, cos, tan 종합 문제</td>
                        <td>김창섭</td>
                        <td>2023-05-10</td>
                    </tr>
                </tbody>
            </table>
            
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
