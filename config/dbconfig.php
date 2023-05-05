<?php
// MySQL 연결 정보
$host = "localhost"; // MySQL 서버 호스트
$username = "root"; // MySQL 사용자 이름
$password = "1234"; // MySQL 사용자 비밀번호
$dbname = "kku_git"; // MySQL 데이터베이스 이름

$conn = new mysqli($host, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";