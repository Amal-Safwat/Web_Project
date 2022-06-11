<?php
include('includes/header.php');
$connect = mysqli_connect("localhost","root","","egway");
mysqli_set_charset($connect, 'utf8mb4');
$user_id = Login::isLoggedIn();
if(isset($_GET['id']))
{
    $unit_data = DB::query('SELECT * FROM units WHERE id=:id',array(':id'=>$_GET['id']));
    if(!$unit_data)
    {
      die('404 error not found!');
    }
    $unit_data = $unit_data[0];
}
else
{
    die('404 error not found!');
}
if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $country = $_POST['cc1'];
    $address = $_POST['address'];
    $bedrooms = $_POST['bedrooms'];
    $bedsBedrooms = $_POST['bedsBedrooms'];
    $livingrooms = $_POST['livingrooms'];
    $bedsLivingrooms = $_POST['bedsLivingrooms'];
    $area = $_POST['area'];
    $price = $_POST['price'];
    // $images = $_POST['imagedata'];
        DB::query('UPDATE units SET unit_name=:unit_name,unit_country=:unit_location,unit_address=:unit_address,bedrooms=:bedrooms,beds_bed=:beds_bed,livingrooms=:livingrooms,beds_living=:beds_living,area=:area,price=:price WHERE id=:unit_id',
        array(':unit_name'=>$name,
                ':unit_location'=>$country,
                ':unit_address'=>$address,
                ':bedrooms'=>$bedrooms,
                ':beds_bed'=>$bedsBedrooms,
                ':livingrooms'=>$livingrooms,
                ':beds_living'=>$bedsLivingrooms,
                ':area'=>$area,
                ':price'=>$price,
                ':unit_id'=>$_GET['id']
        ));

        echo '<script>alert("Edited)</script>';
}
?>
        <?php
          $imgs = DB::query('SELECT * FROM units_image WHERE unit_id=:id',array(':id'=>$_GET['id']));
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b1361fb5d5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <title>Edit Trip</title>
</head>
<body>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="add-container">
        <form class="add-form" action="" method="POST">
        <div class="heading" style="text-align: center;">
                <h1>Edit Trip Details <i class='fas fa-pen'></i></h1>
            </div>
            <label for="name">Trip Name
                <i class="fas fa-file-signature icon"></i>
                <input class="input" type="text" data-length="20" name="name" id="name" placeholder="Trip Name .." value="<?php echo $unit_data['unit_name']; ?>" required/>
            </label>
            <p id="nameError"></p>
            <label for="name">Location
                <i class="fas fa-map-marker-alt icon"></i>
                <?php
                $location_name = DB::query('SELECT * FROM units_locations WHERE id=:id',array(':id'=>$unit_data['unit_location']))[0]['location'];
                ?>
                <select class="input" name="cc1" id="cc1">
                <option value="<?php echo $unit_data['unit_location'];?>"><?php echo $location_name;?></option>
                <?php
                     $query = "SELECT * FROM units_locations";
                     $result = mysqli_query($connect,$query);
                     if(mysqli_num_rows($result) > 0)
                     {
                        while($row = mysqli_fetch_array($result))
                        {
                            if($row["id"] == $unit_data['unit_country'])
                            {
                              continue;
                            }
                            else
                            {
                ?>
                    <option value="<?php echo $row["id"];?>"><?php echo $row["location"];?></option>
                <?php
                            }
                        }
                    }
                ?>
                </select>
            </label>
            <label for="address">Trip Location
                <i class="fas fa-map-pin icon"></i>
                <input class="input" type="text" name="address" data-length="60" id="address" placeholder="Trip Location .." value="<?php echo $unit_data['unit_address']; ?>" required/>
            </label>
            <p id="addressError"></p>
            <hr>
            <div class="one-line">
                <label style="flex: 1;" for="bedrooms">Bedrooms
                    <i class="fas fa-person-booth icon"></i>
                    <input class="input" type="number" name="bedrooms" data-length="1" placeholder="Bedrooms .." value="<?php echo $unit_data['bedrooms']; ?>" required/>
                </label>
                <label style="flex: 1;" for="bedrooms">Beds
                    <i class="fas fa-bed icon"></i>
                    <input class="input" type="number" name="bedsBedrooms" data-length="1" placeholder="Beds .." value="<?php echo $unit_data['beds_bed']; ?>" required/>
                </label>
            </div>
            <div class="one-line">
                <label style="flex: 1;" for="livingrooms">Livingrooms
                    <i class="fas fa-tv icon"></i>
                    <input class="input" type="number" name="livingrooms" data-length="1" placeholder="Living Rooms .." value="<?php echo $unit_data['livingrooms']; ?>" required/>
                </label>
                <label style="flex: 1;" for="bedrooms">Bathrooms
                    <i class="fas fa-bed icon"></i>
                    <input class="input" type="number" name="bedsLivingrooms" data-length="1" placeholder="Bedrooms .." value="<?php echo $unit_data['bathrooms']; ?>" required/>
                </label>
            </div>
            <label for="address">Area (Meter)
                <i class="fas fa-ruler-vertical icon"></i>
                <input class="input" type="text" name="area" id="area" data-length="2" placeholder="Area (Meter) .." value="<?php echo $unit_data['area']; ?>" required/>
            </label>
            <p id="areaError"></p>
            <label for="address">Price (Per Night)
                <i class="fas fa-pound-sign icon"></i>
                <input class="input" style="margin-bottom: 50px;" data-length="3" type="text" name="price" placeholder="Price (Per Night) .." value="<?php echo $unit_data['price']; ?>" required/>
            </label>

                <a class="upload-img" href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Images</a>
                <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" multiple>

            <div class="preview-images-zone" style="margin-top: 10px;">
              <?php foreach ($imgs as $img):?>
                <img width="150px" src="<?php echo $img['image']; ?>">
              <?php endforeach; ?>
            </div>

            <div class="button"><input type="submit" class="sub" name="save" id="submit-new" value=" Save Data"></div>
        </form>
    </div>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="layout/js/upload.js"></script>
    <!-- <script src="layout/js/validations.js"></script> -->
    <?php include('includes/footer.php');?>
