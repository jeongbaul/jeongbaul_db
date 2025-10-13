<?php
require_once 'db.php'; // mysqli 버전 db.php 포함

// 업로드 폴더 설정
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// 썸네일 생성 함수
function createThumbnail($srcFile, $destFile, $thumbWidth = 150) {
    list($width, $height, $type) = getimagesize($srcFile);

    switch ($type) {
        case IMAGETYPE_JPEG:
            $srcImg = imagecreatefromjpeg($srcFile);
            break;
        case IMAGETYPE_PNG:
            $srcImg = imagecreatefrompng($srcFile);
            break;
        case IMAGETYPE_GIF:
            $srcImg = imagecreatefromgif($srcFile);
            break;
        default:
            return false;
    }

    $thumbHeight = floor($height * ($thumbWidth / $width));
    $thumbImg = imagecreatetruecolor($thumbWidth, $thumbHeight);

    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
        imagecolortransparent($thumbImg, imagecolorallocatealpha($thumbImg, 0, 0, 0, 127));
        imagealphablending($thumbImg, false);
        imagesavealpha($thumbImg, true);
    }

    imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($thumbImg, $destFile);
            break;
        case IMAGETYPE_PNG:
            imagepng($thumbImg, $destFile);
            break;
        case IMAGETYPE_GIF:
            imagegif($thumbImg, $destFile);
            break;
    }

    imagedestroy($srcImg);
    imagedestroy($thumbImg);
    return true;
}

// POST 데이터 받기
$birth_date = $_POST['birth_date'] ?? null;
$first_name = $_POST['first_name'] ?? null;
$last_name = $_POST['last_name'] ?? null;
$gender = $_POST['gender'] ?? null;
$hire_date = $_POST['hire_date'] ?? null;

// 초기화
$photoFileName = null;
$photoPath = null;
$photoThumbPath = null;

// 사진 업로드 처리
if (!empty($_FILES['photo']['name'])) {
    $filename = $_FILES['photo']['name'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $photoFileName = date('YmdHis') . "_photo." . $ext;
    $photoPath = $target_dir . $photoFileName;

    if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
        echo "프로필 사진 업로드 실패!";
        exit;
    }

    $photoThumbPath = $target_dir . "thumb_" . $photoFileName;

    if (!createThumbnail($photoPath, $photoThumbPath)) {
        echo "프로필 사진 썸네일 생성 실패!";
        exit;
    }
}

// DB 저장용 데이터 배열
$userData = [
    'birth_date'     => $birth_date,
    'first_name'     => $first_name,
    'last_name'      => $last_name,
    'gender'         => $gender,
    'hire_date'      => $hire_date,
    'photo_path'     => $photoPath,
    'thumbnail_path' => $photoThumbPath,
];

// DB 저장 실행 (mysqli 기반 create 함수)
$result = create('employees', $userData);

if ($result !== false) {
    echo is_numeric($result) ? "사원 등록 완료 (EMP_NO: $result)" : "사원 등록 완료";
} else {
    echo "사원 등록 실패";
}
?>

<button onclick="location.replace('list')">목록으로</button>