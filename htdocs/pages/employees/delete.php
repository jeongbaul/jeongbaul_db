<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

// Delete
$deleteConditions = ['emp_no' => $_GET['emp_no']];
$deleteResult = delete('employees', $deleteConditions);
echo $deleteResult ? "User deleted successfully\n" : "Failed to delete user\n";
?>
<button onclick="location.replace('list.php')">목록으로</button>
