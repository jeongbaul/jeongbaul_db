<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

// Create
$userData = [
    'birth_date' => $_POST['birth_date'],
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'gender' => $_POST['gender'] ,
    'hire_date' => $_POST['hire_date']
];
$result = create('employees', $userData);
if($result !== false){
    echo is_numeric( $result) ? "User created with EMP_NO: $result\n" : "User created successfully\n";
} else {
    echo "Failed to create employees\n";
}
?>
<button onclick="location.replace('list')">목록으로</button>