<?php
// MySQL 서버 연결
$conn = mysqli_connect("localhost", "사용자이름", "비밀번호", "데이터베이스이름");

// 연결 확인
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// MySQL 쿼리 실행
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// 결과 처리
if (mysqli_num_rows($result) > 0) {
  echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

// 연결 종료
mysqli_close($conn);
?>