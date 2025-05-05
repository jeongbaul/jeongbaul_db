<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_no = $_POST['emp_no'];
    $updateData = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'birth_date' => $_POST['birth_date'],
        'gender' => $_POST['gender'],
        'hire_date' => $_POST['hire_date']
    ];
    $updateConditions = ['emp_no' => $emp_no];
    $result = update('employees', $updateData, $updateConditions);

    if ($result) {
        echo "<script>alert('사원 정보가 성공적으로 수정되었습니다.'); location.href='list';</script>";
    } else {
        echo "<script>alert('수정에 실패했습니다.'); history.back();</script>";
    }
}
?>
