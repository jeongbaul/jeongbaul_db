<?php
$host = 'localhost:3306';
$dbname = 'study';
$username = 'root';
$password = '';

try {
    //데이터베이스 연결
    $conn = mysqli_connect($host, $username, $password, $dbname);

    //연결 확인
    if (!$conn) {
        throw new Exception("테이터베이스 연결 실패: " . mysqli_connect_error());
    }

    //문자셋 설정
    if (!mysqli_query($conn, "SET NAMES utf8")) {
        throw new Exception("문자셋 설정 실패: " .mysqli_error($conn));
    }

    echo "DB에 연결 완료";
} catch (Exception $e) {
    //예외 처리
    echo "오류 발생: " . $e->getMessage();
} finally {
    //데이터베이스 연결종료
    if (isset($conn) && $conn) {
        mysqli_close($conn);
    }
}
