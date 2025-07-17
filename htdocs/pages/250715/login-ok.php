<?php
session_start();

$host = "localhost";
$db_name = "employees";
$username = "root";
$password = "";


$conn = mysqli_connect($host, $username, $password, $db_name);
mysqli_set_charset($conn, "utf8");

// mysqli_real_escape_string :PHP와 MySQL을 사용할 때, 입력값의 특수문자를 안전하게 처리해 SQL 인젝션 등 보안 위협을 방지하는 함수
$username = mysqli_real_escape_string($conn, $_POST['username']); 
$passwd = $_POST['password'];

// Query
$sql = "SELECT * FROM user WHERE id='$username' AND pw=password('$passwd')";
$query = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($query)) {
  $_SESSION['username'] = $row['name'];
  $_SESSION['level'] = $row['level'];
  $_SESSION['id'] = $row['id'];
?>
<script>
  alert("<?php echo $_SESSION['username']; ?>님 환영합니다.");
  location.replace('view');
</script>
<?php
  // echo "로그인 성공";
  // echo "<a href='/250715/view'>정보보기</a>";
} else {
  echo "로그인 실패";
  echo "<a href='/250715/login'>로그인 화면으로 이동</a>";
}