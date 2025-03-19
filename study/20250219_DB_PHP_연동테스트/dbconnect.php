<?php
function getConnection() {
    $host = "localhost";
    $db_name = "employees";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
        return null;
    }
}
?>
