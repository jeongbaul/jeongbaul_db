<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

// Update
$updateData = [
    'birth_date' => $_POST['birth_date'],
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'gender' => $_POST['gender'] ,
    'hire_date' => $_POST['hire_date']
];
$updateConditions = ['emp_no' => $_POST['emp_no']];
$updateResult = update('employees', $updateData, $updateConditions);
echo $updateResult ? "User updated successfully\n" : "Failed to update user\n";
?>
</body>
</html>
