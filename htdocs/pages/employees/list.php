<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

$now = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$count = isset($_GET['count']) ? (int)$_GET['count'] : 20;
$last_name = isset($_GET['last_name']) ? $_GET['last_name'] : "";
?>

<form method="get" action="#" onsubmit="return validateSearch();">
    <input type="hidden" name="page" value="1" />
    <input type="hidden" name="count" value="<?php echo $count; ?>" />
    <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>"/>
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
    $results = readPaging('employees', [], 'emp_no DESC', $now, $count);
    //$result = read('employees',[], 'emp_no DESC', '20');
} else {
    $results = readPaging('employees', ['first_name' => $last_name], 'emp_no DESC', $now, $count);
    //$result = read('employees',['first_name' => $last_name], 'emp_no DESC', '20');
}
foreach ($results['data'] as $result) {
?>
    <tr>
        <td><a href="view?emp_no=<?php echo $result['emp_no']; ?>"><?php echo $result['emp_no']; ?></a></td>
        <td><?php echo $result['first_name']; ?></td>
        <td><?php echo $result['last_name']; ?></td>
        <td>
        <button onclick="location.replace('update?emp_no=<?php echo $result['emp_no']; ?>')">수정</button>
        <button onclick="location.replace('delete?emp_no=<?php echo $result['emp_no']; ?>')">삭제</button>
        </td>
    </tr>
    <?php
}
?>
</table>
<?php
echo "page {$results['page']} of {$results['lastPage']}";

    if($now != 1){
?>
<button onclick="location.replace('list?page=<?php echo $now-1; ?>&count=<?php echo $count; ?>&last_name=<?php echo $last_name; ?>')">Prev</button>
<?php 
    }
    if($results['lastPage'] != $now){
?>
<button onclick="location.replace('list?page=<?php echo $now+1; ?>&count=<?php echo $count; ?>&last_name=<?php echo $last_name; ?>')">Next</button>
<?php
    }
?>
<button onclick="location.replace('insert')">등록</button>