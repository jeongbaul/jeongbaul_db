<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

$last_name="";
if(isset($_post['last_name'])){
    $last_name = $POST['last_name'];
}
//$last_name=isset($_post['last_name']) ? $_POST['last_name'] : "";
?>
<form method=""post action="#">
    <input type="text" name="last_name" value="<?php echo $last_name; ?>"/>
    <input type="submit" value="검색" />
</form>


<table border="1">
    <tr>
        <th>회원번호</th>
        <th>이름</th>
        <th>성</th>
    </tr>
<?php
// Read
$user = read('employees',['first_name' => $last_name], 'emp_no DESC', '10');
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
