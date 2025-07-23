<?php
$conn = new mysqli("localhost", "root", "", "employees");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

// GET 또는 POST 방식으로 MENU_ID 받기 (보통 GET)
$menu_id = $_GET['menu_id'] ?? '';

if (!$menu_id) {
    echo "삭제할 메뉴 ID가 없습니다.";
    exit;
}

// 삭제 쿼리 실행
$sql = "DELETE FROM MENU WHERE MENU_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $menu_id);

if ($stmt->execute()) {
    echo "<script>alert('메뉴가 삭제되었습니다.'); location.href='/menu/list';</script>";
} else {
    echo "삭제 오류: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
