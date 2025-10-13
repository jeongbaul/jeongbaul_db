<?php
// Create
$target_dir = "uploads/";
$target_dir2 = "uploads/thumbnail/";
$filename = $_FILES['fileToUpload']['name']; // 파일.png
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$file_name = date('YmdHis') . "." . $ext; // 20250506203915.png

$target_file = $target_dir . $file_name; // uploads/20250506203915.png

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo"<br>name". $_FILES["fileToUpload"]["name"]; // 
    echo"<br>type". $_FILES["fileToUpload"]["type"]; // png jpg gif jpeg pdf zip exe 
    echo"<br>size". $_FILES["fileToUpload"]["size"]; // 10 MB, 1GB , 
    echo"<br>tmp_name". $_FILES["fileToUpload"]["tmp_name"];
    echo"<br>error". $_FILES["fileToUpload"]["error"];
    echo"<br>full_path". $_FILES["fileToUpload"]["full_path"];

    $src  = $target_file;
    $dest = $target_dir2 . $file_name;
    if (create_thumbnail($src, $dest, 150)) {
        echo "썸네일 생성 성공!";
    } else {
        echo "썸네일 생성 실패!";
    }

} else {
    echo "실패";

}
$photoData = [
    'path' => $target_dir,
    'file_name' => $file_name,
    'real_file_name' => $_FILES["fileToUpload"]["name"]
];

$result = create('photo', $photoData);
if($result !== false){
    echo is_numeric( $result) ? "User created with PHOTO_NO: $result\n" : "File Upload successfully\n";
} else {
    echo "Failed to create photo\n";
}

?>
<button onclick="location.replace('photo-list')">파일목록</button>
