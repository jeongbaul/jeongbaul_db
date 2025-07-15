<?php
// DB 연결
$conn = new mysqli("localhost", "root", "", "employees");

// 메뉴 목록 조회
$result = $conn->query("SELECT MENU_ID, MENU_NAME FROM MENU");
?>

<h2>메뉴 등록</h2>
<form action="menu-insert" method="post">
    MENU_ID: <input type="text" name="menu_id" required><br><br>
    MENU_NAME: <input type="text" name="menu_name" required><br><br>
    MENU_PATH: <input type="text" name="menu_path" required><br><br>

    MENU_UPPER:
    <select name="menu_upper">
        <option value="ROOT">ROOT</option>
        <?php while($row = $result->fetch_assoc()) { ?>
            <option value="<?= $row['MENU_ID'] ?>">
                <?= $row['MENU_NAME'] ?> (<?= $row['MENU_ID'] ?>)
            </option>
        <?php } ?>
    </select><br><br>

    ORDER_NUM: <input type="number" name="order_num" value="1" required><br><br>

    <input type="submit" value="등록하기">
</form>
