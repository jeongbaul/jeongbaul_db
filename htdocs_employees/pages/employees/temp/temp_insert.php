<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

// Create
$userData = [
    'emp_no' => '500000',
    'birth_date' => '1955-11-20',
    'first_name' => 'joonhyeok',
    'last_name' => 'lim',
    'gender' => 'M' ,
    'hire_date' => '2025-01-22'
];
$result = create('employees', $userData);
if($result !== false){
    echo is_numeric( $result) ? "User created with EMP_NO: $result\n" : "User created successfully\n";
} else {
    echo "Failed to create employees\n";
}