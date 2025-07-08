<?php
    $host = "localhost";
    $db_name = "employees";
    $username = "root";
    $password = "";

    $sql = <<<EOT
WITH RECURSIVE MENU_TREE AS ( 
	SELECT 
		MENU_ID,
		MENU_NAME,
		MENU_PATH,
		MENU_UPPER,
		ORDER_NUM,
		'1' AS LV
	FROM MENU
	WHERE MENU_UPPER IS NULL
UNION ALL
	SELECT 
		M.MENU_ID,
		CONCAT(REPEAT('ㄴ', MT.LV), M.MENU_NAME),
		M.MENU_PATH,
		M.MENU_UPPER,
		M.ORDER_NUM,
		MT.LV + 1 AS LV
	FROM MENU M
	INNER JOIN MENU_TREE MT 
    ON M.MENU_UPPER = MT.MENU_ID
)
SELECT * FROM MENU_TREE
ORDER BY ORDER_NUM ASC;
EOT;

    $conn = mysqli_connect($host, $username, $password, $db_name);
    mysqli_set_charset($conn, "utf8");
    $query = mysqli_query($conn, $sql);
?>
<ul>
<?php
    while($row = mysqli_fetch_assoc($query)){
?>
    <li><?php echo $row['MENU_NAME']; ?></li>
<?php
    }
?>
</ul>
<?php
    mysqli_close($conn);
?>
