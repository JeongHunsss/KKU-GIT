<?php
    session_start();
    $_SESSION['cur_page'] = 'reported_list';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>신고 받은 문제</title>
    <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/reported_list.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body>      
    신고받은 문제 리스트 페이지
</body>
</html>