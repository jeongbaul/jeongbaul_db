<?php
$conn = new mysqli("localhost", "root", "", "employees");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

$menu_id = $_POST['menu_id'] ?? '';
$menu_name = $_POST['menu_name'] ?? '';
$menu_path = $_POST['menu_path'] ?? '';
$menu_upper = $_POST['menu_upper'] ?? null;
$order_num = (int)($_POST['order_num'] ?? 1);

if (!$menu_id || !$menu_name || !$menu_path) {
    echo "필수 항목이 누락되었습니다.";
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
    echo "오류: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
