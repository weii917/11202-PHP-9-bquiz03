<?php include_once 'db.php';
$movie=$_GET['id'];
$ondate=$Movie->find($movie)['ondate'];
$end=strtotime("+2 days",strtotime($ondate));
$today=strtotime(date("Y-m-d"));
$diff=($end-$today)/(60*60*24);
for($i=0;$i<=$diff;$i++){
    $date=date("Y-m-d",strtotime("+$i days"));
    echo "<option value='$date'>$date</option>";
}
?>