<style>
.lists{
    position: relative;
    left:114px;
}
.item *{
    box-sizing: border-box;
}
.item{
 width:200px;
 height:240px;
 margin:auto;
 position:absolute;
 box-sizing: border-box;
 display:none;
}
.item div img{
    width:100%;
    height:220px;
}
.item div {
    text-align: center;
}    
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="lists">
            <?php
            $posters=$Poster->all(['sh'=>1]," order by rank");
            foreach($posters as $poster){
            ?>
            <div class="item">
                <div><img src="./img/<?=$poster['img'];?>" alt=""></div>
                <div><?=$poster['name'];?></div>
            </div>
            <?php
            }
            ?>
        </div>
        
        <div class="controls">
        </div>
    </div>
</div>
<script>
$(".item").eq(0).show();


</script>

<style>
.movies{
    display:flex;
    flex-wrap:wrap;
}
.movie{
 display:flex;
 flex-wrap:wrap;
 box-sizing: border-box;
 padding:2px;
 margin:0.5%;
 border:1px solid #ccc;
 border-radius: 5px;
 width:49%;
}    
</style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
    <div class="movies">
        <!-- 先定義出今天日期，前兩天日期 ，顯示分頁數及總分頁-->
        <!-- where ondate大於等於前兩天及小於等於今天&&顯示&& 用rank排序，限制顯示的筆數 -->
        <!-- now會抓到get目前的頁數，start算出這一頁從哪一索引開始 -->
        <!-- limit取資料表start哪一筆要取div幾筆 -->
    <?php
        $today=date("Y-m-d");
        $ondate=date("Y-m-d",strtotime("-2 days"));
        $total=$Movie->count(" where `ondate`>='$ondate'  && `ondate` <='$today'  && `sh`=1");
        $div=4;
        $pages=ceil($total/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $movies=$Movie->all(" where `ondate`>='$ondate'  && `ondate` <='$today'  && `sh`=1 order by rank limit $start,$div");
        foreach($movies as $movie){
    ?>
    <div class="movie">
        <div style="width:35%">
            <a href='?do=intro&id=<?=$movie['id'];?>'>
                <img src="./img/<?=$movie['poster'];?>" style="width:60px;border:3px solid white">
            </a>
        </div>
        <div style="width:65%">
            <div><?=$movie['name'];?></div>
            <div style="font-size:13px;">分級: <img src="./icon/03C0<?=$movie['level'];?>.png" style="width:20px"></div>
            <div style="font-size:13px;">上映日期:<?=$movie['ondate'];?></div>
        </div>
        <div style="width:100%">
            <button onclick="location.href='?do=intro&id=<?=$movie['id'];?>'">劇情介紹</button>
            <button onclick="location.href='?do=order&id=<?=$movie['id'];?>'">線上訂票</button>
        </div>
    </div>
    <?php
        }
    ?>
    </div>
    <!-- for列出總共的頁數，標籤帶有的是那一頁的p -->
    <div class="ct">
        <?php
            if($now-1>0){
                $prev=$now-1;
                echo "<a href='?p=$prev'> < </a>";
            }

            for($i=1 ;$i<=$pages ;$i++){
                echo "<a href='?p=$i'> $i </a>";
            }

            if($now+1<=$pages){
                $next=$now+1;
                echo "<a href='?p=$next'> > </a>";
            }
        ?>

    </div>
    </div>
</div>