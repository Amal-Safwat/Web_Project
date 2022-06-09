<?php
include("./includes/head.php");
$maxPerPage = 15;
$page = 1;
if(isset($_GET["p"])){
  $page = $_GET["p"];
}
$page--;
$items = DB::query('SELECT * FROM units ORDER BY id DESC LIMIT '.$page*$maxPerPage.','.$maxPerPage);
$itemsCount = DB::query('SELECT COUNT(id) as cnt FROM units')[0]["cnt"];
$cnt = ceil($itemsCount / ($maxPerPage))-1;
$start = 0;
$end = $cnt;
if($page>2){
  $start = $page-2;
}
if($cnt-$start > 5){
  $end = $start+4;
}
include("./includes/sidebar.php");
 ?>
      <h1> <i class="fas fa-message"></i>جميع الوحدات</h1>
      <div class="new-sec"></div>
      <?php $ii=0; ?>
      <div style="overflow-x:auto;">
      <table>
        <tr>
          <th>#</th>
          <th>اسم الوحدة</th>
          <th>مكان الوحدة</th>
        </tr>
          <?php $i = 1;
          foreach ($items as $item){
            $unit_location = DB::query('SELECT location FROM units_locations l, units u WHERE u.unit_location = l.id AND u.id =:idd',array(':idd'=>$item['id']))[0]['location'];
            echo
            '<tr><td>'.$i.'</td>
            <td>'.mb_substr($item["unit_name"],0,50).(((mb_strlen($item["unit_name"])) > 50)?"...":"").'</td>'.
            '<td>'.$unit_location.'</td>';
            $i++;
          }
 ?>
      </table>
      <center>
        <?php
          if($start > 0){
            echo '<a href="?p=1"><div class="xbutton">1</div></a>';
          }
          for($i = $start; $i<=$end;$i++){
            if($i == $page){
              echo '<div class="xbutton" style="opacity:0.7">'. ($i+1) .'</div>';
            }else{
              echo '<a href="?p='. ($i+1) .'"><div class="xbutton">'. ($i+1) .'</div></a>';
            }
          }
          if($end < $cnt){
            echo '<a href="?p='. ($cnt+1) .'"><div class="xbutton">'. ($cnt+1) .'</div></a>';
          }
        ?>

      </center>
    </div>

<?php include("./bottom.php"); ?>
