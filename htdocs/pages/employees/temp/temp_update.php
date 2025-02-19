<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

// Update
$updateData = [
    'birth_date' => '1995-11-21',
    'first_name' => 'joonhyeok1',
    'last_name' => 'lim1',
    'gender' => 'F' ,
    'hire_date' => '2025-01-23'
];
$updateConditions = ['emp_no' => 500000];
$updateResult = update('employees', $updateData, $updateConditions);
echo $updateResult ? "User updated successfully\n" : "Failed to update user\n";