<?php
include('includes/header.php');
$connect = mysqli_connect("localhost","root","","egway");
mysqli_set_charset($connect, 'utf8mb4');
$user_id = Login::isLoggedIn();

if(Login::isLoggedIn())
{
    $user_id = Login::isLoggedIn();
    $user = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=>$user_id));
    $user = $user[0];
}
else
{
    echo '<script>window.location="signin.php"</script>';
}

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

if(isset($_POST['confirm']))
{
    $arrival = $_POST['arrival'];
    $leave = $_POST['leave'];

    $from = DB::query('SELECT arrival_time FROM units_bookings WHERE unit_id=:unit_id',array(':unit_id'=>$_GET['id']))[0]['arrival_time'];
    $to = DB::query('SELECT leave_time FROM units_bookings WHERE unit_id=:unit_id',array(':unit_id'=>$_GET['id']))[0]['leave_time'];
    $DateBegin = date('Y-m-d', strtotime($from));
    $DateEnd = date('Y-m-d', strtotime($to));

    if ($arrival >= $DateBegin && $arrival <= $DateEnd)
    {
        echo '<script>alert("Date Already Booked")</script>';
    }
    else
    {
        echo '<script>window.location="payment.php?date-in='. $arrival .'&date-out='. $leave .'&id='.$_GET['id'].' "</script>';
    }


}

?>
<?php
$units = DB::query('SELECT * FROM units WHERE company_id=:company_id',array(':company_id'=>$user_id));
foreach ($units as $unit) {
    $image = "default image here";
    $img = DB::query('SELECT * FROM units_image WHERE unit_id=:id ORDER BY id ASC LIMIT 1',array(':id'=>$unit['id']));
    if($img){
    $image = $img[0]['image'];
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
    <title>Book</title>
</head>
<body>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="add-container">
        <form class="add-form" action="" method="POST" style="width:60%;">
        <div class="heading" style="text-align: center;margin-bottom:50px;">
                <h1>Book Trip <i class='fas fa-bookmark'></i></h1>
            </div>
            <p class="conf">  You are now booking <a href="ad.php?id=<?php echo $unit_data['id'];?>"><?php echo $unit_data['unit_name'];?></a></p>
            <p><i class="fas fa-id-card"></i>  Name : <?php echo $user['name'];?></p>
            <p> <i class="fas fa-envelope"></i> Email : <?php echo $user['email'];?></p>
            <p style="margin-bottom:30px;"> <i class="fas fa-phone"></i> Phonenumber : <?php echo $user['phone'];?></p>
            <div class="one-line">
            <label style="flex: 1;padding-left: 20px;" for="name">Arrival Date
                <i class="fas fa-calendar-day icon"></i>
                <input class="input date" type="date" data-length="20" name="arrival" id="arrival" placeholder="Arrival Date .." oninput="checkArrivalDate()" required/>
            </label>
            <label style="flex: 1;padding-left: 20px;" for="name">Leave Date
                <i class="fas fa-calendar-day icon"></i>
                <input class="input date" style="width:105%;" type="date" data-length="20" name="leave" id="leave" placeholder="Leave Date .." required/>
            </label>
            </div>
            <div class="button"><input type="submit" class="sub" name="confirm" id="submit-new" value=" Confirm Booking"></div>
        </form>
    </div>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="layout/js/upload.js"></script>
    <!-- <script src="layout/js/validations.js"></script> -->
    <?php include('includes/footer.php');?>
