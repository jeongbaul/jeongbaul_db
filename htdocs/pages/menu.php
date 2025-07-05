<h1>서브페이지</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
</body>
</html>
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
                include("./pages/".$context1."/".$context2.".php");
            break;

        default:
            include("./pages/error.php");
            break;
    }
?>
