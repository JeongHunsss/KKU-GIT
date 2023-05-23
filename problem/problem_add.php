<!DOCTYPE html>
<html>
<head>
    <title>문제 등록 페이지</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../bars/css/side_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/problem_add.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: white;
            font-family: Arial, sans-serif;
        }
        
        .container {
            display: flex;
        }
        
        .sidebar {
            flex: 0 0 200px;
        }
        
        .content {
            flex-grow: 1;
            margin-left: 20px;
        }

        form {
            margin: 30px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="submit"],
        input[type="button"] {
            display: inline-block;
            margin-top: 20px;
            margin-right: 20px;
            padding: 10px 20px;
            background-color: blue; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;
        }

        input[type="text"] {
            display: inline-block;
            margin-right: 20px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        textarea {
            display: block;
            margin-right: 20px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: vertical;
        }

        h1 {
            text-align: center;
            color: blue;
        }

        .content-body {
            margin-left: 40pt;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <?php include '../bars/side_bar.php'; ?>
        </div>
                
        <div class="top-bar">
            <?php include '../bars/top_bar.php'; ?>
        </div>

        <div class="content">
            <div class="content-body">
                <h1>문제 등록</h1>
                <form method="post" action="submit.php">

                    <label for="subject">과목 <input type="text" name="subject" id="subject" required></label><br><br>

                    <label for="title">제목 <input type="text" name="title" id="title" required></label><br><br>
                    
                    <label for="content">내용 <input type="text" name="content" id="content" required></label><br><br>
                    
                    <label for="options">보기<br><br>
                    <span style="margin-left: 20px;">1. <input type="text" name="option1" id="option1" required></span><br>
                    <span style="margin-left: 20px;">2. <input type="text" name="option2" id="option2" required></span><br>
                    <span style="margin-left: 20px;">3. <input type="text" name="option3" id="option3" required></span></label><br><br>
                    
                    <label for="answer">정답 <input type="text" name="answer" id="answer" required></label><br><br>
                    
                    <input type="button" value="취소" onclick="history.back();">
                    <input type="submit" value="등록">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
