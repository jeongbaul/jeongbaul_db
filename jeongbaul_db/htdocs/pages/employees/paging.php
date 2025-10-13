<?php
$now = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$count = isset($_GET['count']) ? (int)$_GET['count'] : 1;
$result = readPaging('employees', [], 'emp_no DESC', $now, $count);
// 사용자 테이블에서 now번째 페이지의 데이터를 10개씩 가져옵니다.
// var_dump($result);
foreach ($result['data'] as $user) {
    echo $user['emp_no']."-".$user['first_name'] . '<br>';
}
?>
<br/><br/><br/>
<?php
echo "page {$result['page']} of {$result['lastPage']}";
