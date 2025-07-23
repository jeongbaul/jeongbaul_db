<?php
session_start();

// 로그인 검사
if (!isset($_SESSION['id'])) {
    echo "<script>alert('로그인 후 이용해주세요.'); location.href='/user/login';</script>";
    exit;
}

// 관리자 권한 검사
if (!isset($_SESSION['level']) || $_SESSION['level'] != 1) {
    echo "<script>alert('관리자만 등록할 수 있습니다.'); history.back();</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "잘못된 접근입니다.";
    exit;
}

$menu_id = $_POST['menu_id'] ?? null;
$menu_name = $_POST['menu_name'] ?? null;
$menu_path = $_POST['menu_path'] ?? null;
$menu_upper = $_POST['menu_upper'] ?? null;
$order_num = $_POST['order_num'] ?? null;

if (!$menu_id || !$menu_name || !$menu_path || !$order_num) {
    echo "필수 항목이 누락되었습니다.";
    exit;
}

$conn = new mysqli("localhost", "root", "", "employees");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

$sql = "INSERT INTO MENU (MENU_ID, MENU_NAME, MENU_PATH, MENU_UPPER, ORDER_NUM)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $menu_id, $menu_name, $menu_path, $menu_upper, $order_num);

if ($stmt->execute()) {
    echo "<script>alert('메뉴가 등록되었습니다.'); location.href='menu_form';</script>";
} else {
    echo "오류: " . $conn->error;
}
?>
