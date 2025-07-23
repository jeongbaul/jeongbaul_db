<?php
session_start();
if (!isset($_SESSION['username'])) {
?>
<h2>로그인</h2>
  <form action="login-ok" method="post">
    <label for="username">아이디:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">비밀번호:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
  </form>
<?php
} else {
?>
<h2>내 정보</h2>
환영합니다, <b><?php echo $_SESSION['username']; ?></b>님 <br />
당신의 권한은 <b><?php echo $_SESSION['level']; ?></b>입니다.<br />
<a href="logout">로그아웃</a>
<?php
}
?>

<ul>
    <li><a href="view">로그인 정보</a></li>
</ul>