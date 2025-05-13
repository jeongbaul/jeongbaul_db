<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

// 사원 정보를 조회
$user = read('employees', ['emp_no' => $_GET['emp_no']], '', '1');
print_r($user);
// 사진 경로 및 파일명 불러오기
//$photo = read('photo', ['emp_no' => $_GET['emp_no']], '', '1');  // emp_no로 사진 정보 조회
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사원 상세</title>
</head>
<body>
<h1>사원상세</h1>
    FirstName: <?php echo $user[0]['first_name']; ?><br />
    LastName: <?php echo $user[0]['last_name']; ?><br />
    BirthDate: <?php echo $user[0]['birth_date']; ?><br />
    Gender: <?php echo $user[0]['gender']; ?><br />
    HireDate: <?php echo $user[0]['hire_date']; ?><br />
<img src="/<?php echo $user[0]['photo_path']; ?>" alt-="Default profile Picture" width="100" height="100" />

    <!-- 사진이 있으면 출력, 없으면 기본 이미지 출력 -->
    
    
    <button onclick="location.replace('list')">목록으로</button>
</body>
</html>