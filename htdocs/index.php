<?php
$context1 = isset($_GET['context1']) ? $_GET['context1'] : ""; // "abc"
$context2 = isset($_GET['context2']) ? $_GET['context2'] : ""; // "ccc"
$action = isset($_GET['action']) ? $_GET['action'] : "";     // "list"
include($_SERVER['DOCUMENT_ROOT']."/common/header.php");
if($context2==""){
    // echo "메인";
    include($_SERVER['DOCUMENT_ROOT']."/pages/main.php");
} else {
    include($_SERVER['DOCUMENT_ROOT']."/pages/menu.php");
    // echo "서브";
}
include($_SERVER['DOCUMENT_ROOT']."/common/footer.php");

?>