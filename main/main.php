<!DOCTYPE html>
<html>
<head>
    <title>KKU-GIT</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../bars/css/side_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .sidebar {
            top: 0;
            left: 0;
            width: 200px;
            height: 100vh;
        }

        .top-bar {
            position: fixed;
            top: 0;
            left: 200px;
            width: calc(100% - 200px);
            padding: 10px;
        }

        .content-wrapper {
            margin-left: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
        }

        .notice-box,
        .rank-box,
        .recent-problem-box {
            border: 1px solid black;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            width: 100%;
        }

        .notice-box h2,
        .rank-box h2,
        .recent-problem-box h2 {
            color: black;
        }

        .notice-table,
        .ranking-table,
        .recent-problem-table {
            width: 100%;
            margin-top: 10px;
        }

        .notice-content-title {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            padding-top: 10px;
            padding-bottom: 5px;
        }

        .transparent-table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        .transparent-table th,
        .transparent-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }


        .recent-problem-table {
            width: 100%;
            table-layout: auto;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include '../bars/side_bar.php'; ?>
    </div>

    <div class="top-bar">
        <?php include '../bars/top_bar.php'; ?>
    </div>

    <br><br><br>

    <div class="content-wrapper">

        <div class="notice-box">
            <h2>공지사항</h2>
            <table class="notice-table">
                <thead>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>등록일자</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0001</td>
                        <td>홈페이지 점검</td>
                        <td>2023-05-13</td>
                    </tr>
                    <tr>
                        <td>0002</td>
                        <td>충청북도 네트워크 대회</td>
                        <td>2023-05-12</td>
                    </tr>
                    <tr>
                        <td>0003</td>
                        <td>인턴쉽 모집</td>
                        <td>2023-05-11</td>
                    </tr>
                </tbody>
            </table>
            <table class="notice-table">
                <tbody>
                    <tr>
                        <th colspan="3" class="notice-content-title">내용</th>
                    </tr>
                    <tr>
                        <td colspan="3">2023/06/06 점검으로 인해 접속 불가</td>
                    </tr>
                    <tr>
                        <td colspan="3">2023/04/01~2023/06/07 모집 접수</td>
                    </tr>
                    <tr>
                        <td colspan="3">2023년 2학기 인턴쉽 모집 중</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="rank-box">
            <h2>랭킹</h2>
            <table class="transparent-table">
                <thead>
                    <tr>
                        <th>순위</th>
                        <th>이름(등급)</th>
                        <th>포인트</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>유지민 (골드)</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>이지은 (실버)</td>
                        <td>900</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>송강호 (브론즈)</td>
                        <td>800</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>임강원 (브론즈)</td>
                        <td>700</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>박정훈 (브론즈)</td>
                        <td>600</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="recent-problem-box">
            <h2>최근 등록 문제</h2>
            <table class="recent-problem-table">
                <thead>
                    <tr>
                        <th>등록번호</th>
                        <th>과목</th>
                        <th>제목</th>
                        <th>등록자</th>
                        <th>등록일자</th>
                    </tr>
                </thead>
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
                        <td>빅데이터</td>
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
        </div>
    </div>
</body>
</html>
