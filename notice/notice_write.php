<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>공지사항 글쓰기</title>
    <link rel="stylesheet" type="text/css" href="../sidebar.css">
    <link rel="stylesheet" type="text/css" href="../header.css">
    <link rel="stylesheet" type="text/css" href="./css/notice_write.css">
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
            <h1>공지사항 글쓰기</h1>
        </div>
        <div class="container">
            <form action="process_notice.php" method="post">
                <div class="form-group">
                    <label for="title">제목</label>
                    <input type="text" id="title" name="title" placeholder="제목" required>
                </div>
                <div class="form-group">
                    <label for="content">내용</label>
                    <textarea id="content" name="content" rows="10" cols="50" required></textarea>
                </div>

                <div style="text-align: right;">
                    <input type="submit" class="submit-button" value="등록">
                    <button type="button" class="cancel-button" onclick="location.href='notice.php'">취소</button>
                </div>
            </form>
        </div>
    </div>

  </body>
</html>