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
        echo "<li>".$row['MENU_NAME'];

        $sql2 = "SELECT M.MENU_ID, M.MENU_NAME, M.MENU_PATH, M.MENU_UPPER, M.ORDER_NUM".
                " FROM MENU M".
                " WHERE M.MENU_UPPER = '".$row['MENU_ID']."'";
        $query2 = mysqli_query($conn, $sql2);
        echo "<ul>";
        while($row2 = mysqli_fetch_assoc($query2)){
            echo "<li>".$row2['MENU_NAME'];

            $sql3 = "SELECT M.MENU_ID, M.MENU_NAME, M.MENU_PATH, M.MENU_UPPER, M.ORDER_NUM".
                    " FROM MENU M".
                    " WHERE M.MENU_UPPER = '".$row2['MENU_ID']."'";
            $query3 = mysqli_query($conn, $sql3);
            echo "<ul>";
            while($row3 = mysqli_fetch_assoc($query3)){
                echo "<li>".$row3['MENU_NAME']."</li>";
            }
            echo "</ul>";
            echo "</li>";
        }
            echo "</ul>";
        echo "</li>";
    }
    echo "</ul>";
    mysqli_close($conn);
?>
<style>
.menu,
.menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu > li {
  position: relative;
  float: left;
  background: #3498db;
  color: #fff;
  padding: 12px 24px;
  cursor: pointer;
}

.menu > li:hover {
  background: #2980b9;
}

/* 2depth */
.menu li ul {
  display: none;
  position: absolute;
  left: 0;
  top: 100%;
  background: #2980b9;
  min-width: 160px;
  z-index: 100;
}

/* 3depth */
.menu li ul li {
  position: relative;
}
.menu li ul li ul {
  left: 100%;
  top: 0;
}

.menu li:hover > ul {
  display: block;
}

.menu li ul li {
  float: none;
  padding: 10px 20px;
  background: #2980b9;
  color: #fff;
}

.menu li ul li:hover {
  background: #1abc9c;
}
    
</style>
