<?php
include_once "db.php";
// 用id逐筆檢查id是否存在$_POST['del'] 先刪除資料，再撈出資料庫資料將POST來的東西存進去送回資料庫
foreach($_POST['id'] as $idx => $id ){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $Poster->del($id);
    }else{
        $row=$Poster->find($id);
        $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $row['name']=$_POST['name'][$idx];
        $row['ani']=$_POST['ani'][$idx];
        $Poster->save($row);
    }
}
to("../back.php?do=poster");


?>