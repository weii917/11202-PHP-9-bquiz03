<?php
include_once 'db.php';

$DB=new DB($_POST['table']);
$row=$DB->find($_POST['id']);
$sw=$DB->find($_POST['sw']);

$tmp=$row['rank'];
$row['rank']=$sw['rank'];
$sw['rank']=$tmp;

$DB->save($row);
$DB->save($sw);
