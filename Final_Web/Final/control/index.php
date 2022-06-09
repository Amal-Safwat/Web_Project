<?php include("./includes/head.php"); ?>
<?php include("./includes/sidebar.php"); ?>
      <h1>أهلاً بك عزيزي<?php echo $Ausername; ?></h1>
      <div class="new-sec"></div>
      <h1 style="text-align:center;">الشكاوي</h1>
      <?php
      $complaints = DB::query('SELECT * FROM complaints ORDER BY id DESC LIMIT 15');
      ?>
      <table>
        <tr>
          <td>#</td>
          <td>الشكوي</td>
          <td>رقم الوحدة</td>
        </tr>
        <?php
        $i = 1;
        foreach ($complaints as $complaint) {
          echo
          '<tr>
            <td>'.$i.'</td>
            <td>'.$complaint['complaint'].'</td>
            <td>'.$complaint['unit_id'].'</td>
          </tr>';
          $i++;
        } ?>
      </table>
      <center><a href="./all-complaints.php"><div class="xbutton">عرض الكل <i class="fas fa-eye"></i> </div></a></center>
      <br>
      <div class="new-sec"></div>
      <?php include("./bottom.php"); ?>
