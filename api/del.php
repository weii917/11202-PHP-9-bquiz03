<?php include_once "db.php";

$DB=new DB($_POST['table']);
$DB->del($_POST['id']);