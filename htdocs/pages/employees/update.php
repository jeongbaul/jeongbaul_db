<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

$user = read('employees', ['emp_no' => $_GET['emp_no']], '', '1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사원 수정</title>
</head>
<body>
<h1>사원수정</h1>
<form action="update-ok.php" method="post">
    <input type="hidden" name="emp_no" value="<?php echo htmlspecialchars($_GET['emp_no']); ?>" />
    FirstName:<input type="text" name="first_name" value="<?php echo htmlspecialchars($user[0]['first_name']); ?>" required /><br />
    LastName:<input type="text" name="last_name" value="<?php echo htmlspecialchars($user[0]['last_name']); ?>" required /><br />
    BirthDate:<input type="date" name="birth_date" value="<?php echo htmlspecialchars($user[0]['birth_date']); ?>" required /><br />
    Gender:<select name="gender" required>
        <option value="M" <?php if($user[0]['gender'] === 'M') echo 'selected'; ?>>남성</option>
        <option value="F" <?php if($user[0]['gender'] === 'F') echo 'selected'; ?>>여성</option>
    </select><br />

    HireDate:
    <input type="date" name="hire_date" value="<?php echo htmlspecialchars($user[0]['hire_date']); ?>" required /><br />
    <input type="submit" value="수정하기" />
    <input type="reset" value="초기화" />
    <input type="button" value="뒤로가기" onclick="location.replace('list')" />
</form>
</body>
</html>
