<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $pw = $_POST['pw'] ?? '';

    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['pw'] == $pw) { 
        $_SESSION['id'] = $user['id'];
        $_SESSION['level'] = $user['level'];
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('로그인 실패'); history.back();</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
</head>
<body>
    <h2>로그인</h2>
    <form method="post" action="/user/login">
        <label>아이디: <input type="text" name="id" required></label><br>
        <label>비밀번호: <input type="password" name="pw" required></label><br>
        <button type="submit">로그인</button>
    </form>
</body>
</html>
