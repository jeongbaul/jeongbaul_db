<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $emp_no = $_GET['emp_no'] ?? null;
    $confirmed = $_GET['confirmed'] ?? null;

    if (!$emp_no || !$confirmed) {
        echo "<script>alert('잘못된 접근입니다.'); location.href='list';</script>";
        exit;
    }

    $deleteConditions = ['emp_no' => $emp_no];
    $result = delete('employees', $deleteConditions);

    if ($result) {
        echo "<script>alert('사원이 성공적으로 삭제되었습니다.'); location.href='list';</script>";
    } else {
        echo "<script>alert('사원 삭제에 실패했습니다.'); history.back();</script>";
    }
} else {
    echo "<script>alert('올바르지 않은 요청입니다.'); location.href='list';</script>";
}
?>
