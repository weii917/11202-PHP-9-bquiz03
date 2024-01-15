<?php include_once 'db.php';
// 帶一個日期至少有五場電影
$movie=$_GET['movie'];
$movieName=$Movie->find($movie)['name'];
$date=$_GET['date'];

$H=date("G");
// 24hr-當下時間除2減1得出剩下的場次可以選，6減剩下的場次得出start多少開始算到剩下場次
// $start=($H<14)?1:6-((ceil(24-$H)/2)-1);
$start=($H>=14 && $date==date("Y-m-d"))?7-ceil((24-$H)/2):1;
for($i=$start;$i<=5;$i++){
    $qt=$Order->sum('qt',['movie'=>$movieName,'date'=>$date,'session'=>$sess[$i]]);
    $lave=20-$qt;
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位 $lave</option>";
}


?>