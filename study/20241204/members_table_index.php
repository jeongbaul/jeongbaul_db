<?php
// 데이터베이스 연결
$conn = new mysqli("localhost", "root", "", "member_table");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 회원 정보 출력 (member_table123 테이블에서)
$sql_member = "SELECT * FROM member_table123";
$result_member = $conn->query($sql_member);

if ($result_member->num_rows > 0) {
    echo "<h1>회원 목록</h1>";
    echo "<table border='1'>";
    echo "<tr><th>No</th><th>ID</th><th>Name</th><th>Address</th><th>Phone</th><th>Gender</th><th>Email</th></tr>";
    while($row = $result_member->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["no"] . "</td>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["addr"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "회원 정보가 없습니다.";
}

// 게시판 목록 출력 (게시판 테이블에서)
$sql_board = "SELECT id, title, author, created_at FROM 게시판";
$result_board = $conn->query($sql_board);

echo "<h1>게시판 목록</h1>";

if ($result_board->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>제목</th><th>작성자</th><th>작성일</th></tr>";
    while ($row = $result_board->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='view_board.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</a></td>";
        echo "<td>" . htmlspecialchars($row['author']) . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "게시글이 없습니다.";
}

$conn->close();
?>
