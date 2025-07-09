<?php
    $host = "localhost";
    $db_name = "employees";
    $username = "root";
    $password = "";

    $sql = <<<EOT
	SELECT 
		MENU_ID, MENU_NAME, MENU_PATH, MENU_UPPER, ORDER_NUM, '1' AS LV
	FROM MENU
	WHERE MENU_UPPER IS NULL
EOT;
    $conn = mysqli_connect($host, $username, $password, $db_name);
    mysqli_set_charset($conn, "utf8");
    $query = mysqli_query($conn, $sql);
    echo "<ul class=\"menu\">";
    while($row = mysqli_fetch_assoc($query)){
        echo "<li>";
        echo $row['MENU_NAME'];
        $sql2 = "SELECT M.MENU_ID, M.MENU_NAME, M.MENU_PATH, M.MENU_UPPER, M.ORDER_NUM".
                " FROM MENU M".
                " WHERE M.MENU_UPPER = '".$row['MENU_ID']."'";
        $query2 = mysqli_query($conn, $sql2);
        while($row2 = mysqli_fetch_assoc($query2)){
            echo "<ul>";
            echo "<li>";
            echo $row2['MENU_NAME'];
            $sql3 = "SELECT M.MENU_ID, M.MENU_NAME, M.MENU_PATH, M.MENU_UPPER, M.ORDER_NUM".
                    " FROM MENU M".
                    " WHERE M.MENU_UPPER = '".$row2['MENU_ID']."'";
            $query3 = mysqli_query($conn, $sql3);
            while($row3 = mysqli_fetch_assoc($query3)){
                echo "<ul>";
                echo "<li>";
                echo $row3['MENU_NAME'];
                echo "</li>";
                echo "</ul>";
            }
            echo "</li>";
            echo "</ul>";
        }
        echo "</li>";
    }
    echo "</ul>";
    mysqli_close($conn);
?>
<style>
</style>
