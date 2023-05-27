<?php
    session_start();
    $_SESSION['cur_page'] = 'main';
?>
<!DOCTYPE html>
<html>
<head>
    <title>KKU-GIT</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<?php include '../bars/top_bar.php'; ?>
<body class="main_body">

<div class="banner">
  <img src="../img/banner.PNG" alt="Banner" class="banner-img active">
  <img src="../img/banner2.PNG" alt="Banner 2" class="banner-img inactive">
  <img src="../img/banner3.PNG" alt="Banner 3" class="banner-img inactive">
</div>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var currentIndex = 0;
            var images = $('.banner-img');
            var totalImages = images.length;

            function showImage(index) {
                images.removeClass('active').addClass('inactive');
                images.eq(index).removeClass('inactive').addClass('active');
            }

            function nextImage() {
                currentIndex++;
                if (currentIndex >= totalImages) {
                    currentIndex = 0;
                }
                showImage(currentIndex);
            }

            setInterval(nextImage, 3000); 
        });
    </script>
    
</body>
</html>
