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


    // echo "DB에 연결 완료";
    // SELECT 쿼리 실행
    $query = "SELECT * FROM board LIMIT 10"; //예시 쿼리
    $result = mysqli_query($conn, $query);

    if (!$result) {
        throw new Exception("쿼리 실행 실패: " . mysqli_error($conn));
    }

    //결과 처리 
    while ($row = mysqli_fetch_assoc($result)) {
        // 여기서 각 행의 데이터를 처리합니다
        echo "No: " . $row['no'] . ", 제목: " . $row['subject'] . "<br>";
    }

    //결과셋 해제
    mysqli_free_result($result);

    //echo "DB에 연결 완료";
} catch (Exception $e) {
    //예외 처리
    echo "오류 발생: " . $e->getMessage();
} finally {
    //데이터베이스 연결종료
    if (isset($conn) && $conn) {
        mysqli_close($conn);
    }
}
