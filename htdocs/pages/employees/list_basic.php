<?php
$last_name="";
if(isset($_POST['last_name'])){
    $last_name = $_POST['last_name'];
}
//$last_name=isset($_post['last_name']) ? $_POST['last_name'] : "";
?>
<form method="post" action="#">
    <input type="text" name="last_name" value="<?php echo $last_name; ?>"/>
    <input type="submit" value="검색" />
</form>
<script>
function validateSearch() {
    const searchInput = document.getElementById('last_name').value.trim();
    if (searchInput === "") {
        alert('검색어를 입력해주세요');
        return false;
    }
    return true;
}
</script>

<table border="1">
    <tr>
        <th>회원번호</th>
        <th>이름</th>
        <th>성</th>
        <th>버튼</th>
    </tr>
<?php
// Read
if($last_name == ""){
    $user = read('employees',[], 'emp_no DESC', '20');
} else {
    $user = read('employees',['first_name' => $last_name], 'emp_no DESC', '20');
}
foreach ($user as $user) {
?>
    <tr>
        <td><?php echo $user['emp_no']; ?></td>
        <td><?php echo $user['first_name']; ?></td>
        <td><?php echo $user['last_name']; ?></td>
        <td>
        <button onclick="location.replace('update?emp_no=<?php echo $user['emp_no']; ?>')">수정</button>
        <button onclick="location.replace('delete?emp_no=<?php echo $user['emp_no']; ?>')">삭제</button>
        </td>
    </tr>
    <?php
}
?>
</table>
<button onclick="location.replace('insert')">등록</button>