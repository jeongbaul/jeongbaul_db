<?php
$now = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$count = isset($_GET['count']) ? (int)$_GET['count'] : 20;
$last_name = isset($_GET['last_name']) ? $_GET['last_name'] : "";

// 검색어가 있을 때, 'first_name' LIKE 검색도 고려하면 좋지만, 지금은 정확히 일치만 체크한 듯
// 필요하면 쿼리 함수 readPaging 내부에서 LIKE로 바꾸세요.
?>

<form method="get" action="#" onsubmit="return validateSearch();">
    <input type="hidden" name="page" value="1" />
    <input type="hidden" name="count" value="<?php echo $count; ?>" />
    <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" />
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
        <th>사진</th> <!-- 썸네일 열 추가 -->
        <th>버튼</th>
    </tr>
<?php
// 직원 목록 읽기
if ($last_name == "") {
    $results = readPaging('employees', [], 'emp_no DESC', $now, $count);
} else {
    $results = readPaging('employees', ['first_name' => $last_name], 'emp_no DESC', $now, $count);
}

// 목록 출력
foreach ($results['data'] as $result) {
?>
    <tr>
        <td><a href="view?emp_no=<?php echo $result['emp_no']; ?>"><?php echo $result['emp_no']; ?></a></td>
        <td><?php echo htmlspecialchars($result['first_name']); ?></td>
        <td><?php echo htmlspecialchars($result['last_name']); ?></td>
        <td>
            <?php if (!empty($result['thumbnail_path']) && file_exists($result['thumbnail_path'])): ?>
                <img src="/<?php echo ($result['thumbnail_path']); ?>" alt="썸네일" style="width:50px; height:auto;">
            <?php else: ?>
                썸네일 없음
            <?php endif; ?>
        </td>
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

if ($now != 1) {
?>
    <button onclick="location.replace('list?page=<?php echo $now - 1; ?>&count=<?php echo $count; ?>&last_name=<?php echo urlencode($last_name); ?>')">Prev</button>
<?php
}
if ($results['lastPage'] != $now) {
?>
    <button onclick="location.replace('list?page=<?php echo $now + 1; ?>&count=<?php echo $count; ?>&last_name=<?php echo urlencode($last_name); ?>')">Next</button>
<?php
}
?>
<button onclick="location.replace('insert')">등록</button>
