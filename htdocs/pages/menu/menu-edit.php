<?php
$conn = new mysqli("localhost", "root", "", "employees");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

$menu_id = $_GET['menu_id'] ?? '';
if (!$menu_id) {
    echo "수정할 메뉴 ID가 없습니다.";
    exit;
}

// 기존 메뉴 정보 조회
$sql = "SELECT * FROM MENU WHERE MENU_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $menu_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "해당 메뉴를 찾을 수 없습니다.";
    exit;
}

$menu = $result->fetch_assoc();

// 상위 메뉴 목록 조회
$upperMenus = $conn->query("SELECT MENU_ID, MENU_NAME FROM MENU");
?>

<h2>메뉴 수정</h2>
<form action="menu-update" method="post">
    <input type="hidden" name="menu_id" value="<?= htmlspecialchars($menu['MENU_ID']) ?>">

    MENU_NAME: <input type="text" name="menu_name" value="<?= htmlspecialchars($menu['MENU_NAME']) ?>" required><br><br>
    MENU_PATH: <input type="text" name="menu_path" value="<?= htmlspecialchars($menu['MENU_PATH']) ?>" required><br><br>

    MENU_UPPER:
    <select name="menu_upper">
        <option value="">ROOT</option>
        <?php while ($row = $upperMenus->fetch_assoc()) { ?>
            <option value="<?= htmlspecialchars($row['MENU_ID']) ?>"
                <?= $row['MENU_ID'] === $menu['MENU_UPPER'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($row['MENU_NAME']) ?> (<?= htmlspecialchars($row['MENU_ID']) ?>)
            </option>
        <?php } ?>
    </select><br><br>

    ORDER_NUM: <input type="number" name="order_num" value="<?= (int)$menu['ORDER_NUM'] ?>" required><br><br>

    <input type="submit" value="수정하기">
</form>

<?php
$conn->close();
?>
