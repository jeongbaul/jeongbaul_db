<?php

function test0() {
    return "hello";
}
function test1($a) {
    $a = $a. "문자열추가";
    return $a;
}
function test2($a, $b) {
    return $a.$b;
}

/**
 * 썸네일 생성 함수
 * 
 * @param string $srcPath 원본 이미지 경로
 * @param string $destPath 썸네일 저장 경로
 * @param int $thumbWidth 썸네일 가로 크기 (기본값: 150)
 * @return bool 성공 여부
 */
function create_thumbnail($srcPath, $destPath, $thumbWidth = 150)
{
    if (!file_exists($srcPath)) return false;

    $imgInfo = getimagesize($srcPath);
    if ($imgInfo === false) return false;

    $type = $imgInfo[2];
    switch ($type) {
        case IMAGETYPE_JPEG:
            $srcImg = imagecreatefromjpeg($srcPath);
            break;
        case IMAGETYPE_PNG:
            $srcImg = imagecreatefrompng($srcPath);
            break;
        case IMAGETYPE_GIF:
            $srcImg = imagecreatefromgif($srcPath);
            break;
        default:
            return false;
    }

    $width  = imagesx($srcImg);
    $height = imagesy($srcImg);

    // 비율 유지
    $thumbHeight = floor($height * ($thumbWidth / $width));
    $thumbImg = imagecreatetruecolor($thumbWidth, $thumbHeight);

    // PNG, GIF 투명도 처리
    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
        imagecolortransparent($thumbImg, imagecolorallocatealpha($thumbImg, 0, 0, 0, 127));
        imagealphablending($thumbImg, false);
        imagesavealpha($thumbImg, true);
    }

    // 이미지 리사이즈
    imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

    // 저장
    $result = false;
    switch ($type) {
        case IMAGETYPE_JPEG:
            $result = imagejpeg($thumbImg, $destPath, 90);
            break;
        case IMAGETYPE_PNG:
            $result = imagepng($thumbImg, $destPath);
            break;
        case IMAGETYPE_GIF:
            $result = imagegif($thumbImg, $destPath);
            break;
    }

    imagedestroy($srcImg);
    imagedestroy($thumbImg);

    return $result;
}
?>