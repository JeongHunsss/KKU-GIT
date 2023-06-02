<?php
    session_start();
    $_SESSION['cur_page'] = 'notice';
    include '../config/dbconfig.php';

    // 등록 버튼이 눌렸을 때
    if (isset($_POST['submit_add'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_SESSION['user_id'];

        // 등록 쿼리 실행
        $addQuery = "INSERT INTO notice (title, content, author) VALUES ('$title', '$content', '$user_id')";
        mysqli_query($conn, $addQuery);

        echo '<script>alert("등록되었습니다.");</script>';
        echo '<script>window.location.href = "notice_list.php?title=all";</script>';
    }

    // 수정 버튼이 눌렸을 때
    if (isset($_POST['submit_edit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $noticeIdx = $_GET['idx']; // 수정할 공지사항의 인덱스

        // 수정 쿼리 실행
        $editQuery = "UPDATE notice SET title = '$title', content = '$content' WHERE idx = $noticeIdx";
        mysqli_query($conn, $editQuery);

        echo '<script>alert("수정되었습니다.");</script>';
        echo '<script>window.location.href = "notice_list.php?title=all";</script>';
    }

    // 공지사항 정보 가져오기
    if(isset($_GET['idx'])){
        $noticeIdx = $_GET['idx']; // GET 메소드를 통해 전달

        // 공지사항 정보 쿼리
        $noticeQuery = "SELECT n.*, u.name AS author_name FROM notice AS n
                        JOIN user AS u ON u.id = n.author
                        WHERE n.idx = $noticeIdx";
        $noticeResult = mysqli_query($conn, $noticeQuery);
        $noticeData = mysqli_fetch_assoc($noticeResult);
    }

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
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">제목<div style="color: red;">*</div></label>
                    <input type="text" id="title" name="title" placeholder="제목" maxlength="20" required value="<?php if(isset($_GET['idx'])) echo $noticeData['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="content">내용<div style="color: red;">*</div></label>
                    <textarea id="content" name="content" rows="10" cols="50" maxlength="2000" required><?php if(isset($_GET['idx'])) echo $noticeData['content']; ?></textarea>
                </div>

                <div class="btn" >
                    <?php
                    // 수정일 경우 수정 버튼을 표시
                    if (isset($_GET['idx'])) {
                        echo '<input type="submit" class="submit-button" name="submit_edit" value="수정">';
                    } else {
                        // 등록일 경우 등록 버튼을 표시
                        echo '<input type="submit" class="submit-button" name="submit_add" value="등록">';
                    }
                    ?>
                    <button type="button" class="cancel-button" onclick="location.href='notice_list.php?title=all'">취소</button>
                </div>
            </form>
        </div>
        
    </div>

  </body>
</html>