<?php
session_start();

// 로그인 검사 (필요하면 주석 해제하세요)
// if (!isset($_SESSION['id'])) {
//     echo "<script>alert('로그인 후 이용해주세요'); location.href='/user/login';</script>";
//     exit;
// }

$conn = new mysqli("localhost", "root", "", "employees");
if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

$sql = "SELECT * FROM MENU ORDER BY ORDER_NUM";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <title>메뉴 리스트</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>메뉴 리스트</h2>
    <table>
        <thead>
            <tr>
                <th>MENU_ID</th>
                <th>MENU_NAME</th>
                <th>MENU_PATH</th>
                <th>MENU_UPPER</th>
                <th>ORDER_NUM</th>
                <th>LEVEL</th>
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
                    <td><?= ($row['LEVEL'] == 1) ? '관리자' : '일반 사용자' ?></td>
                    <td><a href="menu-edit?menu_id=<?= urlencode($row['MENU_ID']) ?>">수정</a></td>
                    <td><a href="menu-delete?menu_id=<?= urlencode($row['MENU_ID']) ?>" onclick="return confirm('정말 삭제하시겠습니까?');">삭제</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
