<?php
    include("../common/header.php");
    include("../common/lib.php");

// 함수 테스트 START
echo test0();

echo test1("abc");
$b = test1("문자문자1");
echo $b;

echo test2("나의", "이야기");
// 테스트 end

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
    $query = "SELECT no, subject, writer FROM board LIMIT 10"; //예시 쿼리
    $result = mysqli_query($conn, $query);

    if (!$result) {
        throw new Exception("쿼리 실행 실패: " . mysqli_error($conn));
    }
?>
<table border="1">
    <tr>
    <th>순서</th>
    <th>제목</th>
    <th>작성자</th>
</tr>
<?php

    //결과 처리 
    while ($row = mysqli_fetch_assoc($result)) {
        // 여기서 각 행의 데이터를 처리합니다
        print_r($row);
?>
        <tr>
            <td><?php echo $row['no']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo $row['writer']; ?></td>
        </tr>
<?php
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
?>
</table>

<?php
include("../common/footer.php");
?>