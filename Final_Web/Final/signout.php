<?php
include('includes/header.php');
if (Login::isLoggedIn())
{
    $userid = Login::isLoggedIn();
}
else
{
    die('Not logged in!');
}
if (isset($_POST['signout']))
{

    if (isset($_POST['alldevices']))
    {

        DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));
        echo '<script>alert("Signed Out !")</script>';
        echo '<script>window.location="index.php"</script>';

    }
    else
    {
        if (isset($_COOKIE['SNID']))
        {
            DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
            echo '<script>alert("Signed Out !")</script>';
            echo '<script>window.location="index.php"</script>';
        }
        if (isset($_COOKIE['SNIDA']))
        {
            DB::query('DELETE FROM login_tokens_manger WHERE token=:token', array(':token'=>sha1($_COOKIE['SNIDA'])));
            echo '<script>alert("Signed Out !")</script>';
            echo '<script>window.location="index.php"</script>';
        }
            setcookie('SNID', '1', time()-3600);
            setcookie('SNID_', '1', time()-3600);
            setcookie('SNIDA', '1', time()-3600);
            setcookie('SNIDA_', '1', time()-3600);
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/b1361fb5d5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <title>Sign Out</title>
</head>
<body>
    <div class="signup-container">
        <div class="inputs">
        <div class="heading" style="text-align: center;">
            <h1>Sign Out</h1>
        </div>
            <form action="signout.php" method="POST">
            <div class="alldevices">
            <input type="checkbox" class="signout-btn" name="alldevices" value="alldevices">All Devices ? <br/>
            </div>
            <div class="button"><input type="submit" id="signout" class="sub" name="signout" value="Sign Out"></div>
            </form>
        </div>
        
    </div>
    <?php include('includes/footer.php');?>
</body>
</html>
