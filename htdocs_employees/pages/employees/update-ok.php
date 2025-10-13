<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_no = $_POST['emp_no'];

    // 썸네일 생성 함수 (한 번만 정의)
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

    // 업데이트할 데이터 초기화
    $updateData = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'birth_date' => $_POST['birth_date'],
        'gender' => $_POST['gender'],
        'hire_date' => $_POST['hire_date'],
    ];

    // 사진 업로드 처리
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $filename = $_FILES['photo']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $file_name = date('YmdHis') . "." . $ext;
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $thumb_file = $target_dir . pathinfo($file_name, PATHINFO_FILENAME) . "_thumb." . $ext;

            if (!createThumbnail($target_file, $thumb_file)) {
                echo "<script>alert('썸네일 생성 실패!'); history.back();</script>";
                exit;
            }

            // 기존 이미지 삭제(선택사항, DB에서 기존 파일 경로 가져와서 삭제 필요)
            // 예: 
            // $oldData = read('employees', ['emp_no' => $emp_no], '', 1);
            // if ($oldData) {
            //     if (!empty($oldData[0]['photo_path']) && file_exists($oldData[0]['photo_path'])) {
            //         unlink($oldData[0]['photo_path']);
            //     }
            //     if (!empty($oldData[0]['thumbnail_path']) && file_exists($oldData[0]['thumbnail_path'])) {
            //         unlink($oldData[0]['thumbnail_path']);
            //     }
            // }

            $updateData['photo_path'] = $target_file;
            $updateData['thumbnail_path'] = $thumb_file;
        } else {
            echo "<script>alert('사진 업로드 실패!'); history.back();</script>";
            exit;
        }
    }

    // 데이터 업데이트
    $updateConditions = ['emp_no' => $emp_no];
    $result = update('employees', $updateData, $updateConditions);

    if ($result) {
        echo "<script>alert('사원 정보가 성공적으로 수정되었습니다.'); location.href='list';</script>";
    } else {
        echo "<script>alert('수정에 실패했습니다.'); history.back();</script>";
    }
}
?>