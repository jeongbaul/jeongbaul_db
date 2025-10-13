<?php
session_start();

// 로그인 검사 (필요 시 활성화)
// if (!isset($_SESSION['id']) || $_SESSION['level'] != 1) {
//     echo "<script>alert('관리자만 접근 가능합니다.'); location.href='/user/login';</script>";
//     exit;
// }

$conn = new mysqli("localhost", "root", "", "employees");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

// MENU 수정용 변수 받기
$menu_id = $_POST['menu_id'] ?? '';
$menu_name = $_POST['menu_name'] ?? '';
$menu_path = $_POST['menu_path'] ?? '';
$menu_upper = $_POST['menu_upper'] ?? null;
$order_num = (int)($_POST['order_num'] ?? 1);

// 필수 항목 검사
if (!$menu_id || !$menu_name || !$menu_path) {
    echo "<script>alert('필수 항목이 누락되었습니다.'); history.back();</script>";
    exit;
}

if ($menu_upper === '') {
    $sql = "UPDATE MENU SET MENU_NAME=?, MENU_PATH=?, MENU_UPPER=NULL, ORDER_NUM=? WHERE MENU_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $menu_name, $menu_path, $order_num, $menu_id);
} else {
    $sql = "UPDATE MENU SET MENU_NAME=?, MENU_PATH=?, MENU_UPPER=?, ORDER_NUM=? WHERE MENU_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $menu_name, $menu_path, $menu_upper, $order_num, $menu_id);
}

if ($stmt->execute()) {
    echo "<script>alert('메뉴가 수정되었습니다.'); location.href='/menu/list';</script>";
} else {
    echo "<script>alert('오류가 발생했습니다: " . $conn->error . "'); history.back();</script>";
}

$stmt->close();
$conn->close();
?>
