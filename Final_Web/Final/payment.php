<?php 
include('includes/header.php');
// include('classes/Login.php');

if(isset($_POST['confirm']))
{
    $cardno = $_POST['cardno'];
    $cvv = $_POST['cvv'];

    $id = Login::isLoggedIn();

    if(strlen($cardno) == 16)
    {
        if(strlen($cvv) == 3)
        {
            DB::query('INSERT INTO units_bookings VALUES(\'\',:arrival_time,:leave_time,:user_id,:unit_id)',array(':arrival_time'=>$_GET['date-in'],':leave_time'=>$_GET['date-out'],':user_id'=>$id,':unit_id'=>$_GET['id']));
            echo '<script>alert("Booked")</script>';
            echo '<script>window.location="index.php"</script>';
        }
        else
        {
            echo '<script>alert("Error In CVV")</script>';
        }
    }
    else
    {
        echo '<script>alert("Error In Card Number")</script>';
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
    <title>Payment</title>
</head>
<body>
    <div class="heading" style="text-align: center;margin-bottom:50px;">
        <h1>Confirm Booking<i class="fab fa-cc-visa"></i> <i class="fab fa-cc-mastercard"></i></h1>
    </div>
    <form class="add-form" action="" method="POST" style="width:40%;">
        <div class="payment-desc">
            <p>You have to put payment method details</p>
            <p style="margin-bottom:50px">You won't be charged unless arrival date</p>
        </div>
        <label for="card">Card Number
            <i id="i1" class="far fa-credit-card"></i>
            <input class="input" type="text" name="cardno" id="cardno" placeholder="Card Number .." maxlength="16" size="16" oninput="checkCard()" required/>
        </label>
        <div class="one-line">
            <label style="flex: 1;" for="name">Expire Date
                <i class="fas fa-calendar-day icon"></i>
                <input class="input date" type="month" name="arrival" id="arrival" placeholder="Expire Date.." oninput="checkArrivalDate()" required/>
            </label>
            <label style="flex: 1;padding-left: 20px;" for="name">CVV
                <i class="fas fa-lock icon"></i>
                <input class="input date" style="width:100%;" type="text" name="cvv" id="cvv" placeholder="CVV .." maxlength="3" size="3" required/>
            </label>
        </div>
        <div class="button"><input type="submit" class="sub" name="confirm" id="submit-new" value=" Confirm Booking"></div>
    </form>
    <script>
        function checkCard()
        {
            var card = document.getElementById('cardno').value;
            if(card.charAt(0) == '4')
            {
                document.getElementById("i1").classList.remove('far');
                document.getElementById("i1").classList.remove('fa-credit-card');
                document.getElementById("i1").classList.remove('fab');
                document.getElementById("i1").classList.remove('fa-cc-mastercard');
                document.getElementById("i1").classList.add('fab');
                document.getElementById("i1").classList.add('fa-cc-visa');
            } else if (card.charAt(0) == '5') {
                document.getElementById("i1").classList.remove('far');
                document.getElementById("i1").classList.remove('fa-credit-card');
                document.getElementById("i1").classList.remove('fab');
                document.getElementById("i1").classList.remove('fa-cc-visa');
                document.getElementById("i1").classList.add('fab');
                document.getElementById("i1").classList.add('fa-cc-mastercard');
            } else {
                document.getElementById("i1").classList.add('far');
                document.getElementById("i1").classList.add('fa-credit-card');
            }
        }
    </script>
<?php include('includes/footer.php');?>
