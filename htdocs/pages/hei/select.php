<?php
if (isset($_GET['week'])) {
    $week = $_GET['week'];
    $result = read('prayer', ['week' => $week]);

    if ($result) {
        foreach ($result as $row) {
            echo "<h3>주차: {$row['week']}</h3>";
            echo "<p>질문: {$row['Question']}</p>";
            echo "<p>답변: {$row['Answer']}</p>";
        }
    } else {
        echo "해당 주차의 질문과 답변이 없습니다.";
    }
}
?>

<form method="GET" action="view.php">
    <label for="week">조회할 주차:</label>
    <input type="number" id="week" name="week" required>
    <input type="submit" value="조회">
</form>

<button onclick="location.href='/hei/list'">목록으로</button>
