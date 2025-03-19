<?php
// 데이터베이스 연결
$conn = new mysqli("localhost", "root", "", "member_table");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// URL에서 id 값을 가져옵니다.
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 게시글 데이터 조회
$sql = "SELECT * FROM 게시판 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1>" . htmlspecialchars($row['title']) . "</h1>";
    echo "<p><strong>작성자:</strong> " . htmlspecialchars($row['author']) . "</p>";
    echo "<p><strong>작성일:</strong> " . htmlspecialchars($row['created_at']) . "</p>";
    echo "<p><strong>내용:</strong></p>";
    echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
} else {
    echo "게시글을 찾을 수 없습니다.";
}

$conn->close();
?>

