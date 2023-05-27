<?php
    session_start();
    $_SESSION['cur_page'] = 'problem_add';
?>

<!DOCTYPE html>
<html>
<head>
    <title>문제 등록 페이지</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/problem_add.css">

    <?php include '../bars/top_bar.php'; ?>
</head>
<body>
    <div class="container-add">
        <form class="form-add">
        <hr style="border-width: 0; border-top: 1px solid #ccc; width: 110%;">
            <label class="label-add" for="subject">과목</label>
            <input type="text" name="subject" id="subject" maxlength="10" required>

            <label class="label-add" for="title">제목</label>
            <input type="text1" name="title" id="title" maxlength="20" required>

            <label class="label-add" for="content">내용</label>
            <textarea name="content" id="content" rows="5" maxlength="2000" required></textarea>

            <label class="label-add" for="options">보기</label>
            <input type="text3" name="option1" id="option1" placeholder="1번 보기" maxlength="100" required>
            <input type="text3" name="option2" id="option2" placeholder="2번 보기" maxlength="100" required>
            <input type="text3" name="option3" id="option3" placeholder="3번 보기" maxlength="100" required>

            <label class="label-add" for="answer">정답</label>
            <input type="text3" name="answer" id="answer" required>
            <hr style="border-width: 0; border-top: 1px solid #ccc; width: 110%;">
            <div style="text-align: center;">
                <input type="submit" value="등록" class="submit">
                <input type="button" value="취소" class="cancel">
            </div>
        </form>
    </div>
</body>
</html>