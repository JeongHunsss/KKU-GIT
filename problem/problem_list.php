<?php
session_start();
$_SESSION['cur_page'] = 'problem_list';

include '../config/dbconfig.php';
include '../config/pagination_config.php';

// 검색어 설정
$search_subject = $_GET['subject'];

// 과목 목록 가져오기
$subjectQuery = "SELECT * FROM subject_list";
$subjectResult = mysqli_query($conn, $subjectQuery);

// 문제의 총 개수 조회
if ($search_subject === 'all') { // 전체 검색의 경우
    $countQuery = "SELECT COUNT(*) AS total FROM problem_list";
    $countResult = mysqli_query($conn, $countQuery);
    $totalCount = mysqli_fetch_assoc($countResult)['total'];
} else { // 검색어가 있는 경우
    $countQuery = "SELECT COUNT(*) AS total FROM problem_list WHERE subject = '$search_subject'";
    $countResult = mysqli_query($conn, $countQuery);
    $totalCount = mysqli_fetch_assoc($countResult)['total'];
}

// 현재 페이지 설정
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($currentPage - 1) * $resultsPerPage;

// 문제 데이터 가져오기
$problem_query = "SELECT p.idx, p.subject, p.title, u.name AS author_name, p.date
                    FROM problem_list AS p
                    JOIN user AS u ON p.author = u.id";
if ($search_subject && $search_subject !== 'all') {
    $problem_query .= " WHERE p.subject = '$search_subject'";
}
$problem_query .= " ORDER BY p.idx DESC
                    LIMIT $startIndex, $resultsPerPage";
$problem_result = mysqli_query($conn, $problem_query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>문제 리스트</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bars/css/pagination_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/problem_list.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body>
    <div class="container">
        <h1 class="problem_title">문제 리스트</h1>
        <div class="problem_container">
            <form method="get" action="" class="search-form">
                <select class="subject-input" name="subject" id="subject" required>
                    <option value="all">전체</option>
                    <?php 
                        while ($subjects = mysqli_fetch_assoc($subjectResult)){
                            $selected = ($subjects['subject'] == $search_subject) ? 'selected' : '';
                            echo "<option value=\"{$subjects['subject']}\" $selected>{$subjects['subject']}</option>";
                        }   
                    ?>
                </select>
                <button type="submit" class="search-btn">과목 검색</button>
            </form>
            <button type="button" class="submit-btn" onclick="location.href='./problem_add.php'">문제 등록</button>
        </div>
        <div>
            <table>
                <thead>
                    <tr class="tr-color">
                        <th class="idx">번호</th>
                        <th class="subject">과목</th>
                        <th class="title">제목</th>
                        <th class="author">작성자</th>
                        <th class="date">작성일</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($problem_row = mysqli_fetch_assoc($problem_result)) {
                            if ($problem_row['idx'] % 2 == 1) {
                                echo "<tr class='OnMouse prob_contents' onclick=\"location.href='../problem/problem_detail.php?idx=" . $problem_row['idx'] . "'\">";
                                echo "<td>" . $problem_row['idx'] . "</td>";
                                echo "<td>" . $problem_row['subject'] . "</td>";
                                echo "<td>" . $problem_row['title'] . "</td>";
                                echo "<td>" . $problem_row['author_name'] . "</td>";
                                echo "<td>" . $problem_row['date'] . "</td>";
                                echo "</tr>";
                            } else {
                                echo "<tr class='OnMouse prob_contents2' onclick=\"location.href='../problem/problem_detail.php?idx=" . $problem_row['idx'] . "'\">";
                                echo "<td>" . $problem_row['idx'] . "</td>";
                                echo "<td>" . $problem_row['subject'] . "</td>";
                                echo "<td>" . $problem_row['title'] . "</td>";
                                echo "<td>" . $problem_row['author_name'] . "</td>";
                                echo "<td>" . $problem_row['date'] . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
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