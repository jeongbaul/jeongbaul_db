<?php
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

<form id="hei_form" method="POST" action="/hei/insert">
    <label for="week">주차:</label><br>
    <input type="number" id="week" name="week" /><br /><br />
    
    <label for="question">질문:</label><br>
    <textarea id="question" name="question"></textarea><br /><br />
    
    <label for="answer">답변:</label><br>
    <textarea id="answer" name="answer"></textarea><br /><br />
    <input type="button" onclick="goCheck()" value="삽입" />
</form>

<button onclick="location.href='/hei/list'">목록으로</button>


<script>
    function goCheck(){
        form = document.getElementById('hei_form');
        week = document.getElementById('week');
        question = document.getElementById('question');
        answer = document.getElementById('answer');
        if(week.value == ''){
            alert('주차를 입력해주세요.');
            week.style.backgroundColor = "#FFFFCC";
            week.focus();
        }
        else if(question.value == ''){
            alert('질문을 입력해주세요.');
            question.style.backgroundColor = "#FFFFCC";
            question.focus();
        }
        else if(answer.value == ''){
            alert('답변을 입력해주세요.');
            answer.style.backgroundColor = "#FFFFCC";
            answer.focus();
        }
        else {
            form.submit();
        }
    }
</script>