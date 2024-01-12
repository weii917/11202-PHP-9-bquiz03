<?php include_once 'db.php';
// 因編輯傳過來的有可能為空所以不適合用isset判斷，isset只要有變數空值也是true，因poster空值，會找不到檔案顯示圖片
// 判斷不是空的才執行搬移資料與附與POST檔案名稱存進去
if(!empty($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'],"../img/{$_FILES['trailer']['name']}");
    $_POST['trailer']=$_FILES['trailer']['name'];
}

if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'],"../img/{$_FILES['poster']['name']}");
    $_POST['poster']=$_FILES['poster']['name'];
}

$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
unset($_POST['year'],$_POST['month'],$_POST['date']);

if(!isset($_POST['id'])){
    $_POST['sh']=1;
    $_POST['rank']=$Movie->max('id')+1;
}

$Movie->save($_POST);
to("../back.php?do=movie");
