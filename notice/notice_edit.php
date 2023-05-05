<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>공지사항 수정</title>
    <link rel="stylesheet" type="text/css" href="../sidebar.css">
    <link rel="stylesheet" type="text/css" href="../header.css">
	<link rel="stylesheet" type="text/css" href="./css/notice_edit.css">
</head>
<body>
    <div class="sidebar">
        <?php include '../sidebar.php'; ?>
    </div>
    <div class="header-wrapper">
        <?php include '../header.php'; ?>
        <hr class="my-hr">
    </div>

    <div class="cont">
        <div class="header">
            <h1>공지사항 수정하기</h1>
        </div>

        <div class="container">
        <form action="process_notice.php" method="POST">
            <div class="notice">
                <div class="title">
                    <input type="text" id="title" name="title" placeholder="제목 불러오기" required>
                </div>
                <div class="info">
                    <p>수정일 <span class="date">2023-05-12</span></p> 
                </div>
                <div class="content">
                    <textarea id="content" name="content" rows="10" cols="50" required>수정할 내용 불러오기</textarea>
                </div>
            </div>
            <div class="button">
                <input type="submit" class="submit-button" value="완료">
                <button type="button" class="cancel-button" onclick="location.href='notice_detail.php'">취소</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>