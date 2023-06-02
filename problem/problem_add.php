<?php
session_start();
$_SESSION['cur_page'] = 'problem_add';
include '../config/dbconfig.php';

// 과목 목록 가져오기
$subjectQuery = "SELECT * FROM subject_list";
$subjectResult = mysqli_query($conn, $subjectQuery);

// 문제 등록 버튼이 눌렸을 때
if (isset($_POST['submit_add'])) {
    $subject = $_POST['subject'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $option1 = $_POST['choice1'];
    $option2 = $_POST['choice2'];
    $option3 = $_POST['choice3'];
    $answer = $_POST['answer'];
    $user_id = $_SESSION['user_id'];

    // 문제 등록 쿼리 실행
    $addQuery = "INSERT INTO problem_list (subject, title, content, choice1, choice2, choice3, answer, author) 
                    VALUES ('$subject', '$title', '$content', '$option1', '$option2', '$option3', '$answer', '$user_id')";
    mysqli_query($conn, $addQuery);
    // 10점 추가
    $query = "UPDATE user SET point = point + 10 WHERE id = '$user_id'";
     mysqli_query($conn, $query);

    echo '<script>alert("문제가 등록되었습니다. +10점");</script>';
    echo '<script>window.location.href = "../problem/problem_list.php?subject=all";</script>';
}

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
        <form class ="form-add" method="post">
            <hr style="border-width: 0; border-top: 1px solid #ccc; width: 110%;">
            <label class="label-add" for="subject">과목<div style="color: red;">*</div></label>
            <select class ="subject-input" name="subject" id="subject" required>
                <?php 
                    while ($subjects = mysqli_fetch_assoc($subjectResult)){
                        echo "<option value=\"{$subjects['subject']}\">{$subjects['subject']}</option>";
                    }   
                ?>
            </select>

            <label class="label-add" for="title">제목<div style="color: red;">*</div></label>
            <input type="text1" name="title" id="title" maxlength="20" placeholder="최대 20자" required>

            <label class="label-add" for="content">내용<div style="color: red;">*</div></label>
            <textarea name="content" id="content" rows="5" maxlength="2000" required></textarea>

            <label class="label-add" for="options">보기 (보기는 필수 입력X)</label>
            <input type="text3" name="choice1" id="choice1" placeholder="1번 보기" maxlength="100">
            <input type="text3" name="choice2" id="choice2" placeholder="2번 보기" maxlength="100">
            <input type="text3" name="choice3" id="choice3" placeholder="3번 보기" maxlength="100">

            <label class="label-add" for="answer">정답<div style="color: red;">*</div></label>
            <input type="text3" name="answer" id="answer" maxlength="100" required>
            <hr style="border-width: 0; border-top: 1px solid #ccc; width: 110%;">
            <div style="text-align: center;">
                <input type="submit" name="submit_add" value="등록" class="submit">
                <input type="button" value="취소" class="cancel" onclick="location.href='problem_list.php?subject=all'">
            </div>
        </form>
    </div>
</body>
</html>