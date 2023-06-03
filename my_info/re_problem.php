<?php
session_start();
$_SESSION['cur_page'] = 'my_page';
$query_id = $_SESSION['user_id'];

include '../config/dbconfig.php';
include '../config/pagination_config.php';

// 등록한 문제의 총 개수 조회
$countQuery = "SELECT COUNT(*) AS total FROM problem_list WHERE author = '$query_id'";
$countResult = mysqli_query($conn, $countQuery);
$totalCount = mysqli_fetch_assoc($countResult)['total'];

// 등록한 문제 정보 가져오기
$regProInfoQuery = "SELECT p.idx, p.subject, p.title, u.name AS author_name, p.date
                    FROM problem_list AS p
                    JOIN user AS u ON p.author = u.id
                    WHERE p.author = '$query_id'
                    ORDER BY p.idx DESC 
                    LIMIT $startIndex, $resultsPerPage";
$regProInfoResult = mysqli_query($conn, $regProInfoQuery);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>등록 문제 내역</title>
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/pagination_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/my_problem.css">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
</head> 
<?php include '../bars/top_bar.php'; ?>
<body>
<div class="cont">
    <div class="title">
        <h1>등록 문제 내역</h1>
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
            <?php
            while ($row = mysqli_fetch_assoc($regProInfoResult)) {
                echo "<tr class='OnMouse' onclick=\"location.href='../problem/problem_detail.php?idx=" . $row['idx'] . "'\">";
                echo "<td>" . $row['idx'] . "</td>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['author_name'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="pagination-font">
    <!-- 페이지네이션 -->
    <?php
    include '../bars/pagination_bar.php';
    ?>
</div>
</body>
</html>