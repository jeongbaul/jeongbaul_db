<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

if (isset($_GET['week'])) {
    $week = $_GET['week'];

    // Delete from prayer table
    $deleteConditions = ['week' => $week];
    $result = delete('prayer', $deleteConditions);
    
    if ($result) {
        echo "해당 주차의 질문과 답변이 성공적으로 삭제되었습니다.";
    } else {
        echo "삭제에 실패했습니다.";
    }
}
?>

<form method="GET" action="hei_delete.php">
    <label for="week">삭제할 주차:</label>
    <input type="number" id="week" name="week" required>
    <input type="submit" value="삭제">
</form>

<button onclick="location.href='hei_list.php'">목록으로</button>
