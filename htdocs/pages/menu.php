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
      </ul>
    </div>
  </div>
</nav>
<?php
    //echo "context1=".$context1.", context2=".$context2.", action=".$action;
    switch($context1){
        case "employees":
        case "board":
        case "gallery":
        case "validate":
        case "join":
        case "photo":
        case "hei":
        case "menu":
        case "250715":
                include("./pages/".$context1."/".$context2.".php");
            break;

        default:
            include("./pages/error.php");
            break;
    }
?>
