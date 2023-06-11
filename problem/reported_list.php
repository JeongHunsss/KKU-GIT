<?php
session_start();
$_SESSION['cur_page'] = 'reported_list';
include '../config/dbconfig.php';
include '../config/pagination_config.php';

$countQuery = "SELECT COUNT(*) AS total FROM problem_list WHERE report >= 10";
$countResult = mysqli_query($conn, $countQuery);
$totalCount = mysqli_fetch_assoc($countResult)['total'];

// 문제 데이터 가져오기
$problem_query = "SELECT p.idx, p.subject, p.title, u.name AS author_name, p.date, p.report
                    FROM problem_list AS p
                    JOIN user AS u ON p.author = u.id
                    WHERE p.report >= 10
                    ORDER BY p.report DESC
                    LIMIT $startIndex, $resultsPerPage";
$problem_result = mysqli_query($conn, $problem_query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>신고 받은 문제리스트</title>
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bars/css/pagination_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/reported_list.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body>      
    <div class="cont">
        <h1 class="reported_title">신고 받은 문제 리스트</h1>
        <table>
            <thread>
                <tr>
                    <th class="idx">번호</th>
                    <th class="subject">과목</th>
                    <th class="title">제목</th>
                    <th class="author">작성자</th>
                    <th class="date">작성일</th>
                    <th class="report">신고수</th>
                </tr>
            </thread>
            <tbody>
                <?php
                $num = 0;
                while ($problem_row = mysqli_fetch_assoc($problem_result)) {
                    if ($num % 2 == 1) {
                        echo "<tr class='OnMouse prob_contents' onclick=\"location.href='../problem/problem_detail.php?idx=" . $problem_row['idx'] . "'\">";
                        echo "<td>" . $problem_row['idx'] . "</td>";
                        echo "<td>" . $problem_row['subject'] . "</td>";
                        echo "<td>" . $problem_row['title'] . "</td>";
                        echo "<td>" . $problem_row['author_name'] . "</td>";
                        echo "<td>" . $problem_row['date'] . "</td>";
                        echo "<td>" . $problem_row['report'] . "</td>";
                        echo "</tr>";
                        $num = $num + 1;
                    } else {
                        echo "<tr class='OnMouse prob_contents2' onclick=\"location.href='../problem/problem_detail.php?idx=" . $problem_row['idx'] . "'\">";
                        echo "<td>" . $problem_row['idx'] . "</td>";
                        echo "<td>" . $problem_row['subject'] . "</td>";
                        echo "<td>" . $problem_row['title'] . "</td>";
                        echo "<td>" . $problem_row['author_name'] . "</td>";
                        echo "<td>" . $problem_row['date'] . "</td>";
                        echo "<td>" . $problem_row['report'] . "</td>";
                        echo "</tr>";
                        $num = $num + 1;
                    }
                }
                ?>
            </tbody>
        </table>    
        <!-- 페이지네이션 -->
        <?php
        include '../bars/pagination_bar.php';
        ?>
    </div>
</body>
</html>