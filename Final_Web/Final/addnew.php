<?php
include('includes/header.php');
$connect = mysqli_connect("localhost","root","","egway");
mysqli_set_charset($connect, 'utf8mb4');
if(isset($_POST['add']))
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
    $images = $_POST['imagedata'];
    $user_id = Login::isLoggedIn();

    if($country != 0)
    {


        DB::query('INSERT INTO units VALUES(\'\',:unit_name,:unit_location,:unit_address,:bedrooms,:beds_bed,:livingrooms,:beds_living,:area,:price,:company_id)',
        array(':unit_name'=>$name,
                ':unit_location'=>$country,
                ':unit_address'=>$address,
                ':bedrooms'=>$bedrooms,
                ':beds_bed'=>$bedsBedrooms,
                ':livingrooms'=>$livingrooms,
                ':beds_living'=>$bedsLivingrooms,
                ':area'=>$area,
                ':price'=>$price,
                ':company_id'=>$user_id
        ));
        $unit_id = DB::query('SELECT id FROM units WHERE unit_name = :unit_name AND unit_address = :unit_address ORDER BY id DESC LIMIT 1',
        array(':unit_name'=>$name,
              ':unit_address'=>$address
        ))[0]['id'];
        $i = 1;
        foreach ($images as $img) {
          $image_no= str_replace(" ","-",$name);
          $image_no .="-".$i;
          $path = "uploads/".$image_no.".png";
          $img = explode( ',', $img );
          $status = file_put_contents($path,base64_decode($img[1]));
          DB::query('INSERT INTO units_image VALUES(\'\',:image,:unit_id)',
          array(
            ':image'=>$path,
            ':unit_id'=>$unit_id
          ));
          $i++;
        }

        echo '<script>alert("Trip Added")</script>';
    }
    else{
        echo '<script>alert("Please Select Trip Location")</script>';
    }

}

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
    <title>Add New Trip</title>
</head>
<body>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="add-container">
        <form class="add-form" action="addnew.php" method="POST">
        <div class="heading" style="text-align: center;">
                <h1>Add Trip <i class='fas fa-plus'></i></h1>
            </div>
            <label for="name">Trip Name
                <i class="fas fa-file-signature icon"></i>
                <input class="input" type="text" data-length="20" name="name" id="name" placeholder="Trip Name .." required/>
            </label>
            <p id="nameError"></p>
            <label for="name">Location
                <i class="fas fa-map-marker-alt icon"></i>
                <select class="input" name="cc1" id="cc1">
                <option value="0">Location</option>
                <?php
                     $query = "SELECT * FROM units_locations";
                     $result = mysqli_query($connect,$query);
                     if(mysqli_num_rows($result) > 0)
                     {
                        while($row = mysqli_fetch_array($result))
                        {
                ?>
                    <option value="<?php echo $row["id"];?>"><?php echo $row["location"];?></option>
                <?php
                        }
                     }
                ?>
                </select>
            </label>

            <label for="address">Location In Details
                <i class="fas fa-map-pin icon"></i>
                <input class="input" type="text" name="address" data-length="60" id="address" placeholder="Location In Details .." required/>
            </label>
            <p id="addressError"></p>
            <hr>
            <div class="one-line">
                <label style="flex: 1;padding-left: 20px;" for="bedrooms">Bedrooms
                    <i class="fas fa-person-booth icon"></i>
                    <input class="input" type="number" name="bedrooms" data-length="1" placeholder="Bedrooms .." required/>
                </label>
                <label style="flex: 1;" for="bedrooms">Beds
                    <i class="fas fa-bed icon"></i>
                    <input class="input" type="number" name="bedsBedrooms" data-length="1" placeholder="Beds .." required/>
                </label>
            </div>
            <div class="one-line">
                <label style="flex: 1;padding-left: 20px;" for="livingrooms">Living Rooms
                    <i class="fas fa-tv icon"></i>
                    <input class="input" type="number" name="livingrooms" data-length="1" placeholder="Living Rooms .." required/>
                </label>
                <label style="flex: 1;" for="bedrooms">Bathrooms
                    <i class="fas fa-toilet icon"></i>
                    <input class="input" type="number" name="bedsLivingrooms" data-length="1" placeholder="Bathrooms .." required/>
                </label>
            </div>
            <label for="address">Area (Meter)
                <i class="fas fa-ruler-vertical icon"></i>
                <input class="input" type="text" name="area" id="area" data-length="2" placeholder="Area (Meter) .." required/>
            </label>
            <p id="areaError"></p>
            <label for="address">Price (Night)
                <i class="fas fa-pound-sign icon"></i>
                <input class="input" style="margin-bottom: 50px;" data-length="3" type="text" name="price" placeholder="Price (Night) .." required/>
            </label>

                <a class="upload-img" href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Images</a>
                <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" multiple>
            <div class="preview-images-zone" style="margin-top: 10px;">
            </div>

            <div class="button"><input type="submit" class="sub" name="add" id="submit-new" value="Add Trip"></div>
        </form>
    </div>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="layout/js/upload.js"></script>
    <!-- <script src="layout/js/validations.js"></script> -->
    <?php include('includes/footer.php');?>
</body>
</html>
