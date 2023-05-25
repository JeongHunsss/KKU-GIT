<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>공지사항 상세보기</title>
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="../sidebar.css">
    <link rel="stylesheet" type="text/css" href="../header.css">
=======
    <link rel="stylesheet" type="text/css" href="../bars/css/side_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
>>>>>>> 76537d27912d612d1ff05c3fd78892fa7c56e9bf
	<link rel="stylesheet" type="text/css" href="./css/notice_detail.css">
</head>
<body>
    <div class="sidebar">
<<<<<<< HEAD
        <?php include '../sidebar.php'; ?>
    </div>
    <div class="header-wrapper">
        <?php include '../header.php'; ?>
        <hr class="my-hr">
    </div>
    <div class="cont">
        <div class="header">
            <h1>공지사항 상세보기</h1>
=======
        <?php include '../bars/side_bar.php'; ?>
    </div>
            
    <?php include '../bars/top_bar.php'; ?>

	<div class="header">
		<h1>공지사항 상세보기</h1>
	</div>

    <div class="container">
        <div class="notice">
            <div class="title">
                <h2>제목</h2>
            </div>
            <div class="info">
                <p>작성일 <span class="date">2023-05-12</span></p> 
            </div>
            <div class="content">
                <p>내용</p>
            </div>
>>>>>>> 76537d27912d612d1ff05c3fd78892fa7c56e9bf
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
                <button type="button" class="edit-button" onclick="location.href='notice_edit.php'">수정</button>
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