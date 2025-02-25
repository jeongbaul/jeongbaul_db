<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $week = $_POST['week'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    // Insert into prayer table
    $insertData = [
        'week' => $week,
        'Question' => $question,
        'Answer' => $answer
    ];
    $result = create('prayer', $insertData);
    
    if ($result !== false) {
        echo "질문과 답변이 성공적으로 삽입되었습니다.";
    } else {
        echo "삽입에 실패했습니다.";
    }
}
?>

<form method="POST" action="insert.php">
    <label for="week">주차:</label><br>
    <input type="number" id="week" name="week"><br><br>
    
    <label for="question">질문:</label><br>
    <textarea id="question" name="question"></textarea><br><br>
    
    <label for="answer">답변:</label><br>
    <textarea id="answer" name="answer"></textarea><br><br>
    
    <input type="submit" value="삽입">
</form>
