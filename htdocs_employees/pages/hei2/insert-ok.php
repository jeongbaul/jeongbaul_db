 <?php
    $host = "localhost";
    $db_name = "employees";
    $username = "root";
    $password = "";

    $sql = "INSERT INTO employees (컬럼, 컬럼) values ('".$data."','".$data."')";

    $conn = mysqli_connect($host, $username, $password, $db_name);
    $query = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>