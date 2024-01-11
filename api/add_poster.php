<?php
include_once "db.php";
// file傳過去的是二進位所以payload讀取不到，所以上傳成功要再存進POST的img用name，payload才讀取得到

if(isset($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'],"../img/{$_FILES['poster']['name']}");
    $_POST['img']=$_FILES['poster']['name'];
}
// rank取最大的id+1，一開始id0=0+1，排序從1開始
// ani動畫1至3隨機
$_POST['sh']=1;
$_POST['rank']=$Poster->max('id')+1;
$_POST['ani']=rand(1,3);


$Poster->save($_POST);
to("../back.php?do=poster");
?>