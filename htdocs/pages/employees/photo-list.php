<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';
?>
<table border="1">
    <tr>
        <th>사진</th>
        <th>파일명</th>
    </tr>
<?php
$now = 1;
$count = 10;
$results = readPaging('photo', [], 'no DESC', $now, $count);
foreach ($results['data'] as $result) {
?>
    <tr>
        <td><img src="/<?php echo $result['path'] . $result['file_name']; ?>" width="100" height="100" /></td>
        <td><?php echo $result['real_file_name']; ?></td>
    </tr>
    <?php
}
?>
</table>
<button onclick="location.replace('photo')">사진등록</button>