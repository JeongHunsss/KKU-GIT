<?php
session_start();
$_SESSION['cur_page'] = 'notice';

include '../config/dbconfig.php';
include '../config/pagination_config.php';

// 검색어 설정
$search_title = $_GET['title'];

// 공지사항의 총 개수 조회
if ($search_title === 'all') {  // 전체 검색의 경우
    $countQuery = "SELECT COUNT(*) AS total FROM notice";
    $countResult = mysqli_query($conn, $countQuery);
    $totalCount = mysqli_fetch_assoc($countResult)['total'];
} else {   // 검색어가 있는 경우
    $countQuery = "SELECT COUNT(*) AS total FROM notice WHERE title = '$search_title'";
    $countResult = mysqli_query($conn, $countQuery);
    $totalCount = mysqli_fetch_assoc($countResult)['total'];
}

// 현재 페이지 설정
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($currentPage - 1) * $resultsPerPage;

// 공지사항 데이터 가져오기
$notice_query = "SELECT n.idx, n.title, u.name AS author_name, n.date
FROM notice AS n
JOIN user AS u ON n.author = u.id";
if ($search_title && $search_title !== 'all') {
    $notice_query .= " WHERE n.title = '$search_title'";
}
$notice_query .= " ORDER BY n.idx DESC
LIMIT $startIndex, $resultsPerPage";
$notice_result = mysqli_query($conn, $notice_query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>공지사항</title>
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bars/css/pagination_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/notice_list.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body>      
    <div class="cont">
        <h1 class="noti_title">공지사항</h1>
        <div class="search-container">
            <form method="get" action="">
                <input type="text" name="title" placeholder="제목 검색" maxlength="20">
                <button type="submit">검색</button>
            </form>
            <div class="write-btn">
                <?php
                if ($_SESSION['user_id'] === 'admin') {
                    echo '<a href="notice_add.php" class="write-button">글쓰기</a>';
                }
                ?>
            </div>
        </div>
    
        <div class="notice_table">
            <table class="noti">
                <thead>
                    <tr>
                        <th class="noti_th">번호</th>
                        <th class="noti_th">제목</th>
                        <th class="noti_th">작성자</th>
                        <th class="noti_th">작성일</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($notice_row = mysqli_fetch_assoc($notice_result)) {
                        if ($notice_row['idx'] % 2 == 1) {
                            echo "<tr class='noti_contents OnMouse' onclick=\"location.href='notice_detail.php?idx=" . $notice_row['idx'] . "'\" >";
                        } else {
                            echo "<tr class='noti_contents2 OnMouse' onclick=\"location.href='notice_detail.php?idx=" . $notice_row['idx'] . "'\" >";
                        }
                        echo "<td class='noti_td'>{$notice_row['idx']}</td>";
                        echo "<td class='noti_td'>{$notice_row['title']}</td>";
                        echo "<td class='noti_td'>{$notice_row['author_name']}</td>";
                        echo "<td class='noti_td'>{$notice_row['date']}</td>";
                        echo "</tr>";
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