<h1>서브페이지</h1>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/">메인페이지</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/hei/list">하이델</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/employees/list">사원</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/photo/list">포토</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/validate/week">금주의 하이델베르크</a>
        </li>

        <!-- 메뉴관리 메뉴 추가 -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            메뉴관리
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/menu/menu-form">메뉴 등록</a></li>
            <li><a class="dropdown-item" href="/menu/menu-list">메뉴 리스트</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

<?php
// 페이지 호출 처리
switch($context1){
    case "employees":
    case "board":
    case "gallery":
    case "validate":
    case "join":
    case "photo":
    case "hei":
    case "250715":
    case "menu":
        $filepath = "./pages/".$context1."/".$context2;
        if (substr($filepath, -4) !== ".php") {
            $filepath .= ".php";
        }
        if (file_exists($filepath)) {
            include($filepath);
        } else {
            echo "<p>페이지가 존재하지 않습니다.</p>";
        }
        break;
    default:
        include("./pages/error.php");
        break;
}
?>
