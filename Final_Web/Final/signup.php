<?php
include('includes/header.php');
if(Login::isLoggedIn()){
  header('Location:./');
  exit;
}
$connect = mysqli_connect("localhost","root","","egway");
mysqli_set_charset($connect, 'utf8mb4');
if(isset($_POST['create']))
{
    $type = 1;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)))
    {
        if (strlen($name) >= 3 && strlen($name) <= 30)
        {
            if (strlen($password) >= 8 && strlen($password) <= 60)
            {
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    if($password == $repassword)
                    {
                        if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email)))
                        {
                            if($type == 1)
                            {
                                DB::query('INSERT INTO users VALUES(\'\',:name,:email,:phone,:password)',
                                array(':name'=>$name,':phone'=>$phone,':email'=>$email,':password'=>password_hash($password, PASSWORD_BCRYPT)));
                                echo '<script>alert("Account Created")</script>';
                                echo '<script>window.location="signin.php"</script>';

                            }
                            else if($type == 2)
                            {
                                $company_id = $_POST['cc1'];
                                DB::query('INSERT INTO units_manger VALUES(\'\',:name,:email,:phone,:password,:company_id)',
                                array(':name'=>$name,':phone'=>$phone,':email'=>$email,':password'=>password_hash($password, PASSWORD_BCRYPT),':company_id'=>$company_id));
                                echo '<script>alert("Account Created")</script>';
                                echo '<script>window.location="signin.php"</script>';
                            }
                        }
                        else
                        {
                            echo '<script>alert("User Already exists  !")</script>';
                        }
                    }
                    else
                    {
                        echo '<script>alert("Password Not Match  !")</script>';
                    }
                }
                else
                {
                    echo '<script>alert("Error In Email!")</script>';
                }
            }
            else
            {
                echo '<script>alert("Error In Password!")</script>';
            }
        }
        else
        {
          echo '<script>alert("Error In Fullname Length")</script>';

        }
    }
    else
    {
      echo '<script>alert("Email Already Exists")</script>';

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b1361fb5d5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <title>Create Account</title>
</head>
<body>
    <div class="signup-container">
        <div class="inputs">
            <div class="heading" style="text-align: center;">
                <h1>Sign Up</h1>
            </div>
            <form action="signup.php" method="POST">
                <label for="name">Fullname
                    <i id="i1" class="fas fa-id-card"></i>
                    <input class="input" type="text" name="name" id="name" placeholder="Fullname .." oninput="valid()" required/>
                </label>
                <p id="nameError"></p>
                <label for="email">Email
                    <i id="i2" class="fas fa-envelope"></i>
                    <input class="input" type="email" name="email" id="email" placeholder="Email .." required/>
                </label>
                <p id="emailError"></p>
                <label for="phone">Phonenumber
                    <i id="i3" class="fas fa-phone"></i>
                    <input class="input" type="number" name="phone" id="phone" placeholder="Phonenumber .." required/>
                </label>

                <p id="phoneError"></p>
                <label for="password">Password
                    <i id="i4" class="fas fa-key"></i>
                    <input class="input" type="password" name="password" id="password" placeholder="Password .." oninput="passCheck(this.value)" required/>
                </label>
                <p id="passwordError"></p>
                <label for="repassword">Confirm Password
                    <i id="i5" class="fas fa-key"></i>
                    <input class="input" type="password" name="repassword" id="repassword" placeholder="Confirm Password .." oninput="passVer(this.value)" required/>
                </label>
                <p id="repasswordError"></p>
                <div class="button"><input type="submit" class="sub" name="create" id="create" value="Create Account"> </div>
            </form>
        </div>
        <div class="image">
            <img src="img/beach-2179624_1280.jpg" alt="">
        </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="layout/js/validations.js"></script>
    <script>
        function show()
        {
            $("#isSeller").show('slow');
        }

        function hide()
        {
            $("#isSeller").hide('slow');
        }
    </script>
    <?php include('includes/footer.php');?>
