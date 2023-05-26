<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>공지사항 상세보기</title>
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
	<link rel="stylesheet" type="text/css" href="./css/notice_detail.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body>
	<div class="header">
		<h1>공지사항 상세보기</h1>
	</div>
        <div class="container">
            <div class="notice">
                <div class="title">
                    <h2 class="detail-h2">제목</h2>
                </div>
                <div class="info">
                    <p>작성일 <span class="date">2023-05-12</span></p> 
                </div>
                <div class="content">
                    <p>내용</p>
                </div>
            </div>
            <div class="button">
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