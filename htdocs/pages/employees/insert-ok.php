<?php
// 직원 정보 받기
$birth_date = $_POST['birth_date'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$hire_date = $_POST['hire_date'];

// 사진 업로드 처리
$target_dir = "uploads/";
$filename = $_FILES['photo']['name'];
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$file_name = date('YmdHis') . "." . $ext;

$target_file = $target_dir . $file_name;

// 파일이 제대로 업로드되었는지 확인
if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    echo "사진 업로드 성공!";
} else {
    echo "사진 업로드 실패!";
    exit;
}

// 직원 정보와 사진 경로를 데이터베이스에 저장
$userData = [
    'birth_date' => $birth_date,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'gender' => $gender,
    'hire_date' => $hire_date,
    'photo_path' => $target_file,
];

// 직원 정보와 사진을 `employees` 테이블에 삽입
$result = create('employees', $userData);
if ($result !== false) {
    echo is_numeric($result) ? "User created with EMP_NO: $result\n" : "User created successfully\n";
} else {
    echo "Failed to create employees\n";
}
?>

<button onclick="location.replace('list')">목록으로</button>
