<h1>서브페이지</h1>
<p><a href="/">메인페이지</a></p>
<p><a href="/hei/list">하이델</a></p>
<p><a href="/employees/list">사원</a></p>
<p><a href="/photo/list">포토</a></p>
<p><a href="/validate/week">금주의 하이델베르크</a></p>
<hr />
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
