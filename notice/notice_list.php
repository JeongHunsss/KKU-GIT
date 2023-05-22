
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>공지사항</title>
    <link rel="stylesheet" type="text/css" href="../bars/css/side_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/notice_list.css">
</head>
<body>
    <div class="sidebar">
        <?php include '../bars/side_bar.php'; ?>
    </div>
            
    <?php include '../bars/top_bar.php'; ?>
    
    <div class="header">
		<h1>공지사항</h1>
		<div class="search-container">
			<form method="get" action="">
				<input type="text" name="search" placeholder="제목 검색">
				<button type="submit">검색</button>
			</form>
            <div class="write-btn">
                <a href="notice_add.php" class="write-button">글쓰기</a>
            </div>
        </div>
	</div>
    
    <div>
    <table>
            <thead>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td> 
                <td>공지사항1</td>
                <td>관리자</td>
                <td>2022-05-10</td>
            </tr>
            <tr>
                <td>2</td>
                <td>공지사항2</td>
                <td>관리자</td>
                <td>2022-05-11</td>
            </tr>
            <tr>
                <td>3</td>
                <td>공지사항3</td>
                <td>관리자</td>
                <td>2022-05-11</td>
            </tr>
        
            <!-- 다른 공지사항 추가 -->

            </tbody>
        </table>
    </div>  
    <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">&raquo;</a>
    </div>
</body>
</html>