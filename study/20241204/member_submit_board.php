<?php
$conn = new mysqli("localhost", "root", "", "member_table");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// HTML 폼에서 POST로 받은 데이터
$id = $_POST['id'];
$name = $_POST['name'];
$addr = $_POST['addr'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password'];

// SQL 쿼리
$sql = "INSERT INTO member_table123 (id, name, addr, phone, gender, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $id, $name, $addr, $phone, $gender, $email, $password);  // "sssssss"는 7개의 문자열을 받음
$stmt->execute();

echo "회원 가입이 완료되었습니다.";

$stmt->close();
$conn->close();
?>
