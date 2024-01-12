<style>
    .form td:nth-child(1){
        text-align-last: justify;
        padding:3px 5px;
    }
</style>
<h2 class="ct">編輯院線片</h2>
<?php $movie=$Movie->find($_GET['id']);?>
<form action="./api/edit_movie.php" method="post" enctype="multipart/form-data">
<div style="display:flex;align-items:start">
    <div style="width:15%;">影片資料</div>
    <div style="width:85%;">
        <table class="ts form">
            <tr>
                <td class="ct" width="20%">片名</td>
                <td><input type="text" name="name" value="<?=$movie['name'];?>"></td>
            </tr>
            <tr>
                <td class="ct">分級</td>
                <td>
                    <select name="level" id="">
                        <option value="1" <?=($movie['level']==1)?'selected':'';?>>普遍級</option>
                        <option value="2" <?=($movie['level']==2)?'selected':'';?>>輔導級</option>
                        <option value="3" <?=($movie['level']==3)?'selected':'';?>>保護級</option>
                        <option value="4" <?=($movie['level']==4)?'selected':'';?>>限制級</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="ct">片長</td>
                <td><input type="text" name="length" value="<?=$movie['length'];?>"></td>
            </tr>
            <tr>
                <td class="ct">上映日期</td>
                <td>
                    <?php 
                        [$year,$month,$date]=explode("-",$movie['ondate']);
                    ?>
                    <select name="year" id="">
                        <option value="2024" <?=($year==2024)?'selected':'';?>>2024</option>
                        <option value="2025" <?=($year==2025)?'selected':'';?>>2025</option>
                    </select>年
                    <select name="month" id="">
                    <?php
                        for($i=1;$i<=12;$i++){
                            $selected= ($month==$i)?'selected':'';
                            echo "<option value='$i' $selected>$i</option>";
                        }
                    ?>
                    </select>月
                    <select name="date" id="">
                    <?php
                        for($i=1;$i<=31;$i++){
                            $selected= ($date==$i)?'selected':'';
                            echo "<option value='$i' $selected>$i</option>";
                        }
                    ?>
                    </select>日  

                </td>
            </tr>
            <tr>
                <td class="ct">發行商</td>
                <td><input type="text" name="publish"  value="<?=$movie['publish'];?>"></td>
            </tr>
            <tr>
                <td class="ct">導演</td>
                <td><input type="text" name="director"  value="<?=$movie['director'];?>"></td>
            </tr>
            <tr>
                <td class="ct">預告影片</td>
                <td><input type="file" name="trailer" id=""></td>
            </tr>
            <tr>
                <td class="ct">電影海報</td>
                <td><input type="file" name="poster" id=""></td>
            </tr>
        </table>
    </div>
</div>
<div style="display:flex;align-items:start">
    <div style="width:15%;">劇情簡介</div>
    <div style="width:85%;">
        <textarea name="intro"  style="width:99%;height:100px;"><?=$movie['intro'];?></textarea>
    </div>
</div>
<div class="ct">
    <input type="hidden" name="id" value="<?=$movie['id'];?>" >
    <input type="submit" value="編輯">
    <input type="reset" value="重置">
</div>
</form>