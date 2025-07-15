<?php
$conn = new mysqli("localhost", "root", "", "employees");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

$sql = "SELECT * FROM MENU ORDER BY ORDER_NUM";
$result = $conn->query($sql);
?>

<h2>메뉴 리스트</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>MENU_ID</th>
            <th>MENU_NAME</th>
            <th>MENU_PATH</th>
            <th>MENU_UPPER</th>
            <th>ORDER_NUM</th>
            <th>수정</th>
            <th>삭제</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= htmlspecialchars($row['MENU_ID']) ?></td>
                <td><?= htmlspecialchars($row['MENU_NAME']) ?></td>
                <td><?= htmlspecialchars($row['MENU_PATH']) ?></td>
                <td><?= htmlspecialchars($row['MENU_UPPER'] ?: 'ROOT') ?></td>
                <td><?= (int)$row['ORDER_NUM'] ?></td>
                <td>
                    <a href="menu-edit?menu_id=<?= urlencode($row['MENU_ID']) ?>">수정</a>
                </td>
                <td>
                    <a href="menu-delete?menu_id=<?= urlencode($row['MENU_ID']) ?>" onclick="return confirm('정말 삭제하시겠습니까?');">삭제</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$conn->close();
?>
