<?php
//session_start();
//if (!isset($_SESSION['id']) || $_SESSION['level'] != 1) {
//    echo "<script>alert('관리자만 접근 가능합니다.'); location.href='/user/login';</script>";
//    exit;
//}

// DB 연결
$conn = new mysqli("localhost", "root", "", "employees");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

// 메뉴 목록 조회
$result = $conn->query("SELECT MENU_ID, MENU_NAME FROM MENU");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>메뉴 등록</title>
</head>
<body>
    <h2>메뉴 등록</h2>
    <form action="menu-insert" method="post">
        MENU_ID: <input type="text" name="menu_id" required><br><br>
        MENU_NAME: <input type="text" name="menu_name" required><br><br>
        MENU_PATH: <input type="text" name="menu_path" required><br><br>

        MENU_UPPER:
        <select name="menu_upper">
            <option value="ROOT">ROOT</option>
            <?php while($row = $result->fetch_assoc()) { ?>
                <option value="<?= htmlspecialchars($row['MENU_ID']) ?>">
                    <?= htmlspecialchars($row['MENU_NAME']) ?> (<?= htmlspecialchars($row['MENU_ID']) ?>)
                </option>
            <?php } ?>
        </select><br><br>

        ORDER_NUM: <input type="number" name="order_num" value="1" required><br><br>

        <input type="submit" value="등록하기">
    </form>
</body>
</html>
