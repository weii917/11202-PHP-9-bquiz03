<?php include_once 'db.php';
// 帶一個日期至少有五場電影
$movie=$_GET['movie'];
$date=$_GET['date'];

$H=date("G");
// 24hr-當下時間除2減1得出剩下的場次可以選，6減剩下的場次得出start多少開始算到剩下場次
// $start=($H<14)?1:6-((ceil(24-$H)/2)-1);
$start=($H<14)?1:7-((ceil(24-$H)/2));
for($i=$start;$i<=5;$i++){
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位 20</option>";
}


?>