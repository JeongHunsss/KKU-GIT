<!DOCTYPE html>
<html>
<head>
    <title>KKU-GIT</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../bars/css/side_bar.css">
    <link rel="stylesheet" type="text/css" href="../bars/css/top_bar.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
  <div class="sidebar">
    <?php include '../bars/side_bar.php'; ?>
  </div>
            
  <?php include '../bars/top_bar.php'; ?>

    <h1>문제 풀기 페이지</h1>
    <div class="notice-wrapper">
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
        <td>1</td>
        <td>공지사항 제목 1</td>
        <td>2023-05-13</td>
      </tr>
      <tr>
        <td>2</td>
        <td>공지사항 제목 2</td>
        <td>2023-05-12</td>
      </tr>
      <tr>
        <td>3</td>
        <td>공지사항 제목 3</td>
        <td>2023-05-11</td>
      </tr>
      <tr>
        <th colspan="3" class="notice-content-title">내용</th>
      </tr>
      <tr>
        <td colspan="3">공지사항 내용 1</td>
      </tr>
      <tr>
        <td colspan="3">공지사항 내용 2</td>
      </tr>
      <tr>
        <td colspan="3">공지사항 내용 3</td>
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
        <td>유저1 (골드)</td>
        <td>1000</td>
      </tr>
      <tr>
        <td>2</td>
        <td>유저2 (실버)</td>
        <td>900</td>
      </tr>
      <tr>
        <td>3</td>
        <td>유저3 (브론즈)</td>
        <td>800</td>
      </tr>
      <tr>
        <td>4</td>
        <td>유저4 (브론즈)</td>
        <td>700</td>
      </tr>
      <tr>
        <td>5</td>
        <td>유저5 (브론즈)</td>
        <td>600</td>
      </tr>
    </tbody>
  </table>
</div>

<div class="recent-problem-box">
<h2>최근 등록 문제</h2>
  <table>
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
        <td>1</td>
        <td>수학</td>
        <td>최근 등록 문제 제목 1</td>
        <td>작성자1</td>
        <td>2023-05-13</td>
      </tr>
      <tr>
        <td>2</td>
        <td>영어</td>
        <td>최근 등록 문제 제목 2</td>
        <td>작성자2</td>
        <td>2023-05-13</td>
      </tr>
      <tr>
        <td>3</td>
        <td>과학</td>
        <td>최근 등록 문제 제목 3</td>
        <td>작성자3</td>
        <td>2023-05-12</td>
      </tr>
</div>
</html>

