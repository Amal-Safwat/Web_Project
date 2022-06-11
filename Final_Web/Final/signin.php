<?php 
include('includes/header.php');
if (isset($_POST['signin'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = date('Y-m-d H:i:s');

    if (DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)) || DB::query('SELECT email FROM units_manger WHERE email=:email', array(':email'=>$email))) 
    {
        if (password_verify($password, DB::query('SELECT password FROM users WHERE email=:email', array(':email'=>$email))[0]['password']) || password_verify($password, DB::query('SELECT password FROM units_manger WHERE email=:email', array(':email'=>$email))[0]['password'])) 
        {
                echo '<script>alert("Signined In")</script>';
                echo '<script>window.location="index.php"</script>';
                $cstrong = True;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));

                if(DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)))
                {
                    $user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
                }
                else if (DB::query('SELECT email FROM units_manger WHERE email=:email', array(':email'=>$email)))
                {
                    $user_id = DB::query('SELECT id FROM units_manger WHERE email=:email', array(':email'=>$email))[0]['id'];
                }
                
                DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id, :date)', array(':token'=>sha1($token), ':user_id'=>$user_id,':date'=>$date));

                setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
        } else {
                echo '<script>alert("Error In Passwrod")</script>';
                echo '<script>window.location="signin.php"</script>';
        }
    } else {
            echo '<script>alert("Not Registered")</script>';
            echo '<script>window.location="signin.php"</script>';
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
    <link rel="stylesheet" href="css/main.css">
    <title>Sign In</title>
</head>
<body>
    <div class="signup-container">
        <div class="inputs">
            <form action="signin.php" method="POST">
                <div class="heading" style="text-align: center;">
                    <h1>Sign In</h1>
                </div>
                <label for="email">E-Mail
                    <i id="i1" class="fas fa-envelope"></i>
                    <input class="input" type="email" name="email" placeholder="Email .." />
                </label>
                <label for="password">Password
                    <i id="i2" class="fas fa-key"></i>
                    <input class="input" type="password" name="password" placeholder="Password .." />
                </label>
                <div class="button"><input type="submit" class="sub" name="signin" id="signin" value="Sign In"> </div>
                <div class="social-icons" style="text-align: center;">
                    <a href="#" style="font-size: 40px;"><i style="color:#3b5998;" class="fab fa-facebook-square"></i></a>
                    <a href="#" style="font-size: 40px; padding: 0 20px"><i style="color:#00acee" class="fab fa-twitter-square"></i></a>
                    <a href="#" style="font-size: 40px"><i style="color:#E1306C" class="fab fa-instagram-square"></i></a>
                </div>
            </form>
        </div>
        
    </div>
    <?php include('includes/footer.php');?>
</body>
</html>