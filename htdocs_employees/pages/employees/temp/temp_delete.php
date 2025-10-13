<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

// Delete
$deleteConditions = ['emp_no' => 500000];
$deleteResult = delete('employees', $deleteConditions);
echo $deleteResult ? "User deleted successfully\n" : "Failed to delete user\n";


