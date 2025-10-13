<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

// Read
//$user = read('employees', ['first_name' => 'Georgi'], 'emp_no DESC', '10');
//foreach ($user as $user) {
//    echo "ID: {$user['emp_no']}, first_name: {$user['first_name']}, last_name: {$user['last_name']}<br/>";
//}
?>

<table border="1">
    <tr>
        <th>회원번호</th>
        <th>이름</th>
        <th>성</th>
    </tr>
<?php
// Read
$user = read('employees',['first_name' => 'Georgi'], 'emp_no DESC', '10');
foreach ($user as $user) {
?>
    <tr>
    <td><?php echo $user['emp_no']; ?></td>
    <td><?php echo $user['first_name']; ?></td>
    <td><?php echo $user['last_name']; ?></td>
    </tr>
    <?php
}
?>
</table>