<?php include_once('includes/header.php') ?>
    <?php
      $msg = false;
      $price_min = 0;
      $price_max = 99999;
      $bathrooms = 0;
      $bedrooms = 0;
      $beds = 0;
      $livingrooms = 0;
      if(isset($_GET['location']) && isset($_GET['date-in']) && isset($_GET['date-out']) ){
        $location = $_GET['location'];
        $date_in = $_GET['date-in'];
        $date_out = $_GET['date-out'];
        if(isset($_GET['price-min']) && isset($_GET['price-max'])){
            $price_min = $_GET['price-min'];
            $price_max = $_GET['price-max'];
        }
        if(isset($_GET['bathrooms'])){
          if(!empty($_GET['bathrooms']))
          $bathrooms = $_GET['bathrooms'];
        }
        if(isset($_GET['bedrooms'])){
          if(!empty($_GET['bedrooms']))
          $bedrooms = $_GET['bedrooms'];
        }
        if(isset($_GET['beds'])){
          if(!empty($_GET['beds']))
          $beds = $_GET['beds'];
        }
        if(isset($_GET['livingrooms'])){
          if(!empty($_GET['livingrooms']))
          $livingrooms = $_GET['livingrooms'];
        }
      }else{
        $msg = "عفواً, حدث خطأ أثناء البحث. الرجاء المحاولة مرة أخرى";
        $_GET['err_msg']=$msg;

        include("index.php");
        exit;
      }
     ?>
     <h1 class="highlight grey m-20">
       بحث متقدم
     </h1>
     <form class="add-form" action="search.php" method="get" style="width:60%;">
        <input type="hidden" name="location" value="<?php echo $location ?>">
        <input type="hidden" name="date-in" value="<?php echo $date_in ?>">
        <input type="hidden" name="date-out" value="<?php echo $date_out ?>">
         <div class="one-line">
         <label style="flex: 1;padding-left: 20px;" for="name">السعر من
             <i class="fas fa-pound-sign icon"></i>
             <input class="input date" type="number" data-length="3" name="price-min"  placeholder="السعر من" value="0" />
         </label>
         <label style="flex: 1;padding-left: 20px;" for="name">السعر الى
             <i class="fas fa-pound-sign icon"></i>
             <input class="input date" type="number" data-length="3" name="price-max"  placeholder="السعر الى" value="9999" />
         </label>
         </div>
         <div class="one-line">
         <label style="flex: 1;padding-left: 20px;" for="name">عدد الحمامات على الأقل
             <i class="fas fa-toilet icon"></i>
             <input class="input date" type="number" data-length="1" name="bathrooms" placeholder="عدد الحمامات"  />
         </label>
         <label style="flex: 1;padding-left: 20px;" for="name">عدد الغرف على الأقل
             <i class="fas fa-person-booth icon"></i>
             <input class="input date"  type="number" data-length="1" name="bedrooms" placeholder="عدد الغرف" />
         </label>
         </div>
         <div class="button"><input type="submit" class="sub" value="بحث"></div>
     </form>
    <h1 class="highlight grey m-20">
      العقارات حسب البحث
    </h1>
    <div class="flex j-center f-wrap featured-cards">
      <?php
      $date_in = date("Y-m-d", strtotime($date_in));
      $date_out = date("Y-m-d", strtotime($date_out));
      $units = DB::query('SELECT * FROM units u WHERE u.unit_location=:location
        AND (SELECT COUNT(id) FROM units_bookings WHERE arrival_time <= :leave_time AND leave_time >=
        :arrival_time AND unit_id=u.id)=0 AND u.bedrooms>=:bedrooms AND u.price >= :price_min AND u.price <= :price_max AND u.livingrooms >=
       :bathrooms',array(":location"=>$location, ":arrival_time"=>$date_in, ":leave_time"=>$date_out, ":bedrooms"=>$bedrooms, ":bathrooms"=>$bathrooms, ":price_min"=>$price_min, ":price_max"=>$price_max ));
      foreach ($units as $unit) {
        $image = "default image here";
        $img = DB::query('SELECT * FROM units_image WHERE unit_id=:id ORDER BY id ASC LIMIT 1',array(':id'=>$unit['id']));
        if($img){
          $image = $img[0]['image'];
        }
        ?>
        <div class="item">
          <div class="image">
             <img src="<?php echo $image ?>">
          </div>
          <div class="content">
            <h1><?php echo $unit['unit_name'] ?></h1>
            <p class="price"><?php echo $unit['price'] ?></p>
            <div class="details">
              <div class="rooms"><?php echo $unit['bedrooms'] ?></div>
              <div class="bathrooms"><?php echo $unit_data['bathrooms']; ?></div>
              <div class="size"><?php echo $unit['area'] ?></div>
            </div>
            <a href="ad.php?id=<?php echo $unit['id'] ?>"><div class="xbutton">عرض</div></a>
          </div>
        </div>
        <?php
      }
       ?>
    </div>
    <br><br>
<?php include('includes/footer.php'); ?>
