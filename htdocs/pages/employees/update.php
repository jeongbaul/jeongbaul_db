<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

if (!isset($_GET['emp_no'])) {
    echo "<script>alert('사원 번호가 없습니다.'); history.back();</script>";
    exit;
}

$user = read('employees', ['emp_no' => $_GET['emp_no']], '', '1');
if (!$user) {
    echo "<script>alert('해당 사원이 존재하지 않습니다.'); history.back();</script>";
    exit;
}

$emp = $user[0];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>사원 정보 수정</title>
    <script>
        function validateForm() {
            const first = document.querySelector('input[name="first_name"]').value.trim();
            const last = document.querySelector('input[name="last_name"]').value.trim();
            const gender = document.querySelector('select[name="gender"]').value.trim();

            if (first.length < 2 || last.length < 2) {
                alert("이름과 성은 2자 이상 입력해주세요.");
                return false;
            }

            if (gender !== 'M' && gender !== 'F') {
                alert("성별은 M 또는 F만 선택해주세요.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>사원 정보 수정</h1>
    <form action="update-ok" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="emp_no" value="<?php echo htmlspecialchars($emp['emp_no']); ?>" />

        First Name: <input type="text" name="first_name" value="<?php echo htmlspecialchars($emp['first_name']); ?>" required><br />
        Last Name: <input type="text" name="last_name" value="<?php echo htmlspecialchars($emp['last_name']); ?>" required><br />
        Birth Date: <input type="date" name="birth_date" value="<?php echo $emp['birth_date']; ?>" required><br />
        Gender:
        <select name="gender" required>
            <option value="M" <?php if ($emp['gender'] == 'M') echo 'selected'; ?>>남자 (M)</option>
            <option value="F" <?php if ($emp['gender'] == 'F') echo 'selected'; ?>>여자 (F)</option>
        </select><br />
        Hire Date: <input type="date" name="hire_date" value="<?php echo $emp['hire_date']; ?>" required><br /><br />
        <input type="submit" value="수정하기">
        <input type="reset" value="초기화">
        <input type="button" value="뒤로가기" onclick="location.href='list'">
    </form>
</body>
</html>
