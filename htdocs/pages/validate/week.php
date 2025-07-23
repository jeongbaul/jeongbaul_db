<?php
    $host = "localhost";
    $db_name = "employees";
    $username = "root";
    $password = "";
    
    $current_week = date('W'); // 현재 주차

    $sql = "SELECT " .
	" A.week ,A.title ,B.question ,B.Answer" .
    " FROM `pray` A" .
    " JOIN prayer B ON A.week = B.week" .
    " WHERE A.week = '" . $current_week ."'" .
    " ORDER BY B.no ASC";
?>
<h1><?php echo $current_week; ?> 주차 하이델베르크</h1>
<table border="1">
    <tr>
        <th>Title</th>
        <th>Question</th>
        <th>Answer</th>
    </tr>
<?php
    $conn = mysqli_connect($host, $username, $password, $db_name);
    $query = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_assoc($query) ) {
?>
    <tr>
        <td><?php echo $rows['title']; ?></td>
        <td><?php echo $rows['question']; ?></td>
        <td><?php echo $rows['Answer']; ?></td>
    </tr>
    <?php
    }
    mysqli_close($conn);
?>
</table>