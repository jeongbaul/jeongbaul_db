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
<h1>사원상세</h1>
    FirstName:<?php echo $user[0]['first_name']; ?><br />
    LastName:<?php echo $user[0]['last_name']; ?><br />
    BirthDate:<?php echo $user[0]['birth_date']; ?><br />
    Gender:<?php echo $user[0]['gender']; ?><br />
    HireDate:<?php echo $user[0]['hire_date']; ?><br />
    <button onclick="location.replace('list.php')">목록으로</button>
</body>
</html>