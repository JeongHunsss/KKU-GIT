<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../bars/css/side_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/problem_list.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
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
            margin-left: 20pt;
        }
        
        form.search-form {
            margin-top: 20pt;
            margin-left: 160pt;
            text-align: left;
        }
        
        table {
            margin-top: 20px;
            max-width: 80%;
            border-collapse: collapse;
            margin-left: 170pt;
            margin-right: 20pt;
        }
        
        th, td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }
        
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        
        th:first-child,
        td:first-child {
            border-left: 1px solid #dee2e6;
        }
        
        th:last-child,
        td:last-child {
            border-right: 1px solid #dee2e6;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .pagination-box a {
            border: 1px solid black;
            margin: 0 5px;
            padding: 5px;
            color: black;
            text-decoration: none;
        }
        
        .pagination-box a:hover {
            background-color: #f2f2f2;
        }
        
        .pagination-box .active {
            background-color: #007bff;
            color: white;
        }
        
        .pagination-box .disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
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
            <br><br><br>
            <form method="get" action="" class="search-form">
                <label for="subject">과목 검색</label>
                <input type="text" name="subject" id="subject">
                <input type="submit" value="검색">
            </form>

            <form method="get" action="problem_add.php" style="float:right; margin-right:60px;">
                <input type="submit" value="문제 등록">
            </form>
            
            <table>
                <thead>
                    <tr>
                        <th>번호</th>
                        <th>과목</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일</th>
                    </tr>
                </thead>
                <br><br><br>
                <tbody>
                    <tr>
                        <td>0001</td>
                        <td>데이터베이스</td>
                        <td>mysql 설치 방법</td>
                        <td>간미연</td>
                        <td>2023-05-13</td>
                    </tr>
                    <tr>
                        <td>0002</td>
                        <td>운영체제</td>
                        <td>운영체제 용어 정리</td>
                        <td>유지민</td>
                        <td>2023-05-13</td>
                    </tr>
                    <tr>
                        <td>0003</td>
                        <td>컴퓨터알고리즘</td>
                        <td>컴퓨터알고리즘 구조</td>
                        <td>송강호</td>
                        <td>2023-05-12</td>
                    </tr>

                    <tr>
                        <td>0004</td>
                        <td>빅데이터 기초</td>
                        <td>서울통계사이트 웹크롤링</td>
                        <td>임강원</td>
                        <td>2023-05-11</td>
                    </tr>

                    <tr>
                        <td>0005</td>
                        <td>대학수학</td>
                        <td>sin, cos, tan 종합 문제</td>
                        <td>김창섭</td>
                        <td>2023-05-10</td>
                    </tr>

                </tbody>
            </table>
            
            <br>
            
            <div class="pagination">
                <div class="pagination-box">
                    <a href="#"><<</a>
                    <a href="#"><</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">></a>
                    <a href="#">>></a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
