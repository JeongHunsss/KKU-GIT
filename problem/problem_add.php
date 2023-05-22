<!DOCTYPE html>
<html>
<head>
	<title>문제 등록 페이지</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../bars/css/side_bar.css">
	<link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/problem_add.css">
</head>
<body>
	<div class="sidebar">
        <?php include '../bars/side_bar.php'; ?>
    </div>
            
    <?php include '../bars/top_bar.php'; ?>
	
	<h1>문제 등록</h1>
	<form method="post" action="submit.php">

		<label for="subject">과목 <input type="text" name="subject" id="subject" required><br></label><br>

		<label for="title">제목 <input type="text" name="title" id="title" required><br></label><br>
		
		<label for="content">내용 <textarea name="content" id="content" required></textarea><br><br></label>
		
		<label for="options">보기
		1. <input type="text" name="option1" id="option1" required>
		2. <input type="text" name="option2" id="option2" required>
		3. <input type="text" name="option3" id="option3" required><br></label><br>
		
		<label for="answer">정답
		<input type="text" name="answer" id="answer" required></label><br>
		
		<input type="button" value="취소" onclick="history.back();">
		<input type="submit" value="등록">
	</form>
</body>
</html>
