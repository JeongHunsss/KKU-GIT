<?php
if (isset($_POST['register'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    include '../config/dbconfig.php';

    // 데이터베이스에 회원 정보 저장
    $query = "INSERT INTO users (id, password, name) VALUES ('$user_id', '$password', '$name')";
    mysqli_query($conn, $query);
