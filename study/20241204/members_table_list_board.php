<?php
// 데이터베이스 연결
$conn = new mysqli("localhost", "root", "", "member_table123");

// 연결 확인
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

// SQL 쿼리 실행: 게시판 목록 가져오기
$sql = "SELECT id, title, author, created_at FROM board ORDER BY id DESC";
$result = $conn->query($sql);

// HTML 시작
echo "<!DOCTYPE html>";
echo "<html lang='ko'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>게시판 리스트</title>";
echo "</head>";
echo "<body>";
echo "<h1>게시판 리스트</h1>";

// 게시글 출력
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>No</th><th>제목</th><th>작성자</th><th>작성일</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>"; // 번호
        echo "<td><a href='view_board.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</a></td>"; // 제목 + 링크
        echo "<td>" . htmlspecialchars($row['author']) . "</td>"; // 작성자
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>"; // 작성일
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>게시글이 없습니다.</p>";
}

// HTML 끝
echo "</body>";
echo "</html>";

// 데이터베이스 연결 종료
$conn->close();
?>

