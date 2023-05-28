<?php
    session_start();
    $_SESSION['cur_page'] = 'my_page';

    $query_id = $_SESSION['user_id'];

    include '../config/dbconfig.php';
    include '../config/pagination_config.php';

    // 등록된 문제의 총 개수 조회
    $countQuery = "SELECT COUNT(*) AS total FROM problem_list WHERE author = '$query_id'";
    $countResult = mysqli_query($conn, $countQuery);
    $totalCount = mysqli_fetch_assoc($countResult)['total'];

    // 등록된 문제 정보 가져오기
    $regProInfoQuery = "SELECT * FROM problem_list WHERE author = '$query_id' LIMIT $startIndex, $resultsPerPage";
    $regProInfoResult = mysqli_query($conn, $regProInfoQuery);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>푼 문제 내역</title>
        <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
        <link rel="stylesheet" type="text/css" href="../bars/css/pagination_bar.css">
        <link rel="stylesheet" type="text/css" href="./css/my_problem.css">
        <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    </head> 
    <?php include '../bars/top_bar.php'; ?>
    <body>
    <div class="cont">

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
            <!-- 페이지네이션 -->
            <?php
                include '../bars/pagination_bar.php';
            ?>
    </div>
</body>
</html>