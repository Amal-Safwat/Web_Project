<?php include('includes/header.php') ?>
<?php
if(isset($_GET['id'])){
  $unit_data = DB::query('SELECT * FROM units WHERE id=:id',array(':id'=>$_GET['id']));
  if(!$unit_data){
    die('404 error not found!');
  }
  $unit_data = $unit_data[0];
}else{
  die('404 error not found!');
}
 ?>
<div id="ad-body">

  <div class="main-body">
    <div class="title">
      <h1><?php echo $unit_data['unit_name']; ?></h1>
      <div class="price">
        <p><?php echo $unit_data['price'] ?></p>
      </div>
    </div>
    <div class="share-bar">
      <div class="share-button"></div>
      <div class="save-button"></div>
    </div>
    <div class="image-slider">
      <div class="slider" id="slider">
        <?php
        $images = DB::query('SELECT * FROM units_image WHERE unit_id=:id',array(':id'=>$_GET['id']));
        $count=0;
        foreach ($images as $image) {
          ?>
          <div class="slide">
            <img src="<?php echo $image['image']; ?>">
            <?php
            $count++;
        }
          ?>
        <?php for($i = 1; $i<=$count; $i++){
          ?>
        </div>
          <?php
        } ?>
      </div>
      <div class="arrow right" id="right-slide">
        <i class="fas fa-arrow-right"></i>
      </div>
      <div class="arrow left" id="left-slide">
        <i class="fas fa-arrow-left"></i>
      </div>
    </div>
  </div>
  <div class="sidebar">
    <div class="item">
      <div class="title">
        Details
      </div>
      <div class="details">
        <div class="rooms"><?php echo $unit_data['bedrooms']; ?></div>
        <div class="bathrooms"><?php echo $unit_data['bathrooms']; ?></div>
        <div class="size"><?php echo $unit_data['area']; ?></div>
      </div>
    </div>
    <div class="item">
      <div class="title">
        Location
      </div>
      <div class="address">
        <?php echo $unit_data['unit_address']; ?>
      </div>
    </div>
    <div class="item">
      <div class="title">
        Contact Details
      </div>
      <div class="phone">011********</div>
      <div class="whatsapp">011********</div>
      <div class="email">amalkhaled@gmail.com</div>
    </div>
    <div class="item">
      <a href="book.php?id=<?php echo $unit_data['id'] ?>"><div class="xbutton">Book</div></a>
    </div>
    <?php if($type != 0)
    { ?>
    <div class="item">
      <a href="report.php?id=<?php echo $unit_data['id'] ?>"><div class="xbutton">Contact  <i class="fas fa-flag"></i> </div></a>
    </div>
  <?php } ?>
  </div>
</div>
<script type="text/javascript" src="layout/js/slider.js"></script>
<?php include('includes/footer.php'); ?>
