<?php
// 데이터베이스 연결 설정
$host = 'localhost';
$username = 'root';
$password = '1234';
$dbname = 'kku-git';
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die('Could not connect to the database: ' . mysqli_connect_error());
}
?>