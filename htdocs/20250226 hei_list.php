<?php
include $_SERVER['DOCUMENT_ROOT'].'/lib/dbconnect.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/db.php';

$now = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$count = isset($_GET['count']) ? (int)$_GET['count'] : 20;
$week = isset($_GET['week']) ? $_GET['week'] : "";

// 검색 및 목록 조회
if ($week == "") {
    // 모든 주차의 질문과 답변 조회
    $results = readPaging('prayer', [], 'week DESC', $now, $count);
} else {
    // 특정 주차에 대한 질문과 답변 조회
    $results = readPaging('prayer', ['week' => $week], 'week DESC', $now, $count);
}

?>
<form method="get" action="list.php">
    <input type="hidden" name="page" value="1" />
    <input type="hidden" name="count" value="<?php echo $count; ?>" />
    <label for="week">주차 검색:</label>
    <input type="number" name="week" value="<?php echo $week; ?>" />
    <input type="submit" value="검색" />
</form>

<table border="1">
    <tr>
        <th>주차</th>
        <th>질문</th>
        <th>답변</th>
        <th>버튼</th>
    </tr>
<?php
// 데이터 목록 출력
foreach ($results['data'] as $result) {
?>
    <tr>
        <td><?php echo $result['week']; ?></td>
        <td><?php echo $result['Question']; ?></td>
        <td><?php echo $result['Answer']; ?></td>
        <td>
            <!-- 수정, 삭제 버튼 -->
            <button onclick="location.replace('hei_update.php?week=<?php echo $result['week']; ?>')">수정</button>
            <button onclick="location.replace('hei_delete.php?week=<?php echo $result['week']; ?>')">삭제</button>
        </td>
    </tr>
<?php
}
?>
</table>

<?php
// 페이지네이션 출력
echo "page {$results['page']} of {$results['lastPage']}";

// 페이지 네비게이션
if ($now != 1) {
?>
    <button onclick="location.replace('list.php?page=<?php echo $now-1; ?>&count=<?php echo $count; ?>&week=<?php echo $week; ?>')">Prev</button>
<?php 
}
if ($results['lastPage'] != $now) {
?>
    <button onclick="location.replace('list.php?page=<?php echo $now+1; ?>&count=<?php echo $count; ?>&week=<?php echo $week; ?>')">Next</button>
<?php
}
?>
<button onclick="location.replace('hei_insert.php')">질문과 답변 등록</button>
