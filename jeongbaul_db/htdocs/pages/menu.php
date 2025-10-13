<h1>서브페이지</h1>
<p><a href="/">메인페이지</a></p>
<hr />
<?php
    //echo "context1=".$context1.", context2=".$context2.", action=".$action;
    switch($context1){
        case "employees":
        case "board":
        case "gallery":
        case "validate":
        case "join":
        case "hei":
                include("./pages/".$context1."/".$context2.".php");
            break;

        default:
            include("./pages/error.php");
            break;
    }
?>
