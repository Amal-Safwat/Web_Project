<?php include('includes/header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b1361fb5d5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <title>Sign In</title>
</head>
    <div id="home-banner">
      <div class="content">
        <h1 class="highlight">Welcome to EGway Airline
</h1>
        <p>EGway Airline For All Travelers</p>
      </div>
    </div>
    <h1 class="highlight grey m-20">
      Exclusive Travel For You
    </h1>
    <div class="flex j-center f-wrap featured-cards">
      <?php
      $units = DB::query('SELECT * FROM units');
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
              <div class="bathrooms">3</div>
              <div class="size"><?php echo $unit['area'] ?></div>
            </div>
            <a href="ad.php?id=<?php echo $unit['id'] ?>"><div class="xbutton">View</div></a>
          </div>
        </div>
        <?php
      }

       ?>
    </div>
    <br><br>
    
<?php include('includes/footer.php'); ?>
