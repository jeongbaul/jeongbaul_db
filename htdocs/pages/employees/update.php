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
    <title>Document</title>
</head>
<body>
<h1>사원수정</h1>
    <!--수정화면
        method : GET, POST
        data:
            'emp_no' => '500000',
            'birth_date' => '1955-11-20',
            'first_name' => 'joonhyeok',
            'last_name' => 'lim',
            'gender' => 'M' ,
            'hire_date' => '2025-01-22'        
    -->
    <form action="update-ok.php" method="post">
    <input type="hidden" name="emp_no" value="<?php echo $_GET['emp_no']; ?>" />
    FirstName:<input type="text" name="first_name" value="<?php echo $user[0]['first_name']; ?>" /><br />
    LastName:<input type="text" name="last_name" value="<?php echo $user[0]['last_name']; ?>" /><br />
    BirthDate:<input type="text" name="birth_date" value="<?php echo $user[0]['birth_date']; ?>" /><br />
    Gender:<input type="text" name="gender" value="<?php echo $user[0]['gender']; ?>" /><br />
    HireDate:<input type="text" name="hire_date" value="<?php echo $user[0]['hire_date']; ?>" /><br />
    <input type="submit" value="수정하기" />
    <input type="reset" value="초기화" />
    <input type="button" value="뒤로가기" onclick="location.replace('list')" />
    </form>
</body>
</html>