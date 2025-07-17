<?php
session_start();
if (!isset($_SESSION['username'])) {
?>
<script>
    alert("로그인 정보가 없습니다.");
</script>
<?php
} else {
    echo "<h2>환영합니다, " . htmlspecialchars($_SESSION['username']) . "님!</h2>";
    echo '<a href="logout">로그아웃</a>';
}
?>

<a href="login">로그인 이동</a>