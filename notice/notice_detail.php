<?php
    session_start();
    $_SESSION['cur_page'] = 'notice';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>공지사항 상세보기</title>
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
	<link rel="stylesheet" type="text/css" href="./css/notice_detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-wzYS8v63e6sH2iITBn4xh6lAxfA+ar9viq//NgyOESoClafnHErjOSw5XPebHE9PLbXOrzPTzMgTJYqJS0VKbA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<?php include '../bars/top_bar.php'; ?>

<body>
    <div class="cont">
    <h1 class="detail_tit">공지사항 상세보기</h1>
        <div class="detail_container">
            <div class="detail_notice">
                <div class="detail_title">
                    <h2 class="detail-h2">제목</h2>
                </div>
                <div class="detail_info">
                    <p>작성일 <span class="date">2023-05-12</span></p> 
                </div>
                <div class="detail_content">
                    <p class="cnt">내용가리lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll
                        llllllllllllllllllllllllllllllllllllll
                    </p>
                </div>
            </div>
            <div class="notice_button">
                <button type="button" class="edit-button" onclick="location.href='notice_add.php'">수정</button>
                <button type="button" class="delete-button" onclick="confirmDelete()">삭제</button>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            if(confirm("정말로 삭제하시겠습니까?")) {
                location.href = "notice_delete.php";
            }
        }
    </script>
</body>
</html>