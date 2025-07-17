<?php
    $host = "localhost";
    $db_name = "employees";
    $username = "root";
    $password = "";

    // $sql = "INSERT INTO USER (ID, PW, NAME, LEVEL) VALUES ('admin',password('1234'), '관리자',1)";
    $sql = "INSERT INTO USER (ID, PW, NAME, LEVEL) VALUES ('test',password('1234'), '테스터',2)".
            ", ('user1',password('1234'), '임준혁',2)".
            ", ('user2',password('1234'), '정바울',2)";
    $conn = mysqli_connect($host, $username, $password, $db_name);
    mysqli_set_charset($conn, "utf8");
    $query = mysqli_query($conn, $sql);
?>