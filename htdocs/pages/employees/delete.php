<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

if (!isset($_GET['confirmed'])) {
    $emp_no = $_GET['emp_no'];
    echo "
    <script>
        if (confirm('정말로 삭제하시겠습니까?')) {
            location.href = 'delete-ok?emp_no={$emp_no}&confirmed=1';
        } else {
            alert('취소하셨습니다');
            location.replace('list');
        }
    </script>
    ";
    exit;
}
$deleteConditions = ['emp_no' => $_GET['emp_no']];
$deleteResult = delete('employees', $deleteConditions);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>삭제 결과</title>
</head>
<body>
<h1>사원 삭제 결과</h1>
<p>
    <?php echo $deleteResult ? "사원이 성공적으로 삭제되었습니다." : "사원 삭제에 실패했습니다."; ?>
</p>
<button onclick="location.replace('list')">목록으로</button>
</body>
</html>
