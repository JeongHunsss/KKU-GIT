<?php
    session_start();
    $_SESSION['cur_page'] = 'notice';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>공지사항</title>
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/notice_list.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body>      
    <div class="cont">
      <h1 class="noti_title">공지사항</h1>
      <div class="search-container">
         <form method="get" action="">
            <input type="text" name="search" placeholder="제목 검색">
            <button type="submit">검색</button>
         </form>
            <div class="write-btn">
                <a href="notice_add.php" class="write-button">글쓰기</a>
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
                <tr>
                    <td class="noti_td">1</td> 
                    <td class="noti_td">공지사항1</td>
                    <td class="noti_td">관리자</td>
                    <td class="noti_td">2022-05-10</td>
                </tr>
                <tr>
                    <td class="noti_td">2</td>
                    <td class="noti_td">공지사항2</td>
                    <td class="noti_td">관리자</td>
                    <td class="noti_td">2022-05-11</td>
                </tr>
                <tr>
                    <td class="noti_td">3</td>
                    <td class="noti_td">공지사항3</td>
                    <td class="noti_td">관리자</td>
                    <td class="noti_td">2022-05-11</td>
                </tr>
                <tr>
                    <td class="noti_td">4</td>
                    <td class="noti_td">공지사항3</td>
                    <td class="noti_td">관리자</td>
                    <td class="noti_td">2022-05-11</td>
                </tr>
                <tr>
                    <td class="noti_td">5</td>
                    <td class="noti_td">공지사항3</td>
                    <td class="noti_td">관리자</td>
                    <td class="noti_td">2022-05-11</td>
                </tr>
                <tr>
                    <td class="noti_td">6</td>
                    <td class="noti_td">공지사항3</td>
                    <td class="noti_td">관리자</td>
                    <td class="noti_td">2022-05-11</td>
                </tr>
                <!-- 다른 공지사항 추가 -->
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