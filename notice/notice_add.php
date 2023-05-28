<?php
    session_start();
    $_SESSION['cur_page'] = 'notice';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>공지사항 글쓰기</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- FontAwesome 라이브러리 CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/notice_add.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body class="notice_body">  

    <div class="cont">
        <div class="header">
            <h1>공지사항 글쓰기<i class="fas fa-pencil-alt"></i></h1>
            
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

                <div class="btn" >
                    <input type="submit" class="submit-button" value="등록">
                    <button type="button" class="cancel-button" onclick="location.href='notice.php'">취소</button>
                </div>
            </form>
        </div>
        
    </div>

  </body>
</html>