<table border="1">
    <tr>
        <th>사진</th>
        <th>파일명</th>
    </tr>
<?php
$now = 1;
$count = 10;

session_start();

$results = readPaging('photo', [], 'no DESC', $now, $count);
foreach ($results['data'] as $result) {
?>
    <tr>
        <td><img src="/<?php echo $result['path'] ."/thumbnail/". $result['file_name']; ?>" width="100" height="100" /></td>
        <td><?php echo $result['real_file_name']; ?></td>
    </tr>
    <?php
}
?>
</table>
<?php
if (!isset($_SESSION['LEVEL']) && $_SESSION['LEVEL'] == 2 ){
?>
<button onclick="location.replace('photo')">사진등록</button><?php
}
?>
