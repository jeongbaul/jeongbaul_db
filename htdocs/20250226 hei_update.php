<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $week = $_POST['week'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    // Update the question and answer
    $updateData = [
        'Question' => $question,
        'Answer' => $answer
    ];
    $updateConditions = ['week' => $week];
    $result = update('prayer', $updateData, $updateConditions);
    
    if ($result) {
        echo "질문과 답변이 성공적으로 수정되었습니다.";
    } else {
        echo "수정에 실패했습니다.";
    }
} elseif (isset($_GET['week'])) {
    $week = $_GET['week'];
    $result = read('prayer', ['week' => $week]);

    if ($result) {
        $question = $result[0]['Question'];
        $answer = $result[0]['Answer'];
    }
}
?>

<form method="POST" action="hei_update.php">
    <input type="hidden" name="week" value="<?php echo $week; ?>" />
    
    <label for="question">질문:</label><br>
    <textarea id="question" name="question"><?php echo $question; ?></textarea><br><br>
    
    <label for="answer">답변:</label><br>
    <textarea id="answer" name="answer"><?php echo $answer; ?></textarea><br><br>
    
    <input type="submit" value="수정">
</form>
<button onclick="location.href='hei_list.php'">목록으로</button>

