<?php include('includes/header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/b1361fb5d5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <title>Contact Us</title>
</head>
<body id="contact">
    <div class="contact-container">
        <div class="contact">
            <div class="heading">
                <h1 style="color: white;">Contact Us</h1>
            </div>
            <?php if(isset($_POST['name'])){
              echo "<h2 style='color:lightgreen'>Message Sent <br>Thank You</h2>";
            } ?>
            <form action="" method="POST">
                <label for="name">Fullname
                    <i id="i1" class="fas fa-id-card"></i>
                    <input class="input" type="text" name="name" placeholder="Fullname .." />
                </label>
                <label for="email">Email
                    <i id="i2" class="fas fa-envelope"></i>
                    <input class="input" type="email" name="email" placeholder="Email .." />
                </label>
                <label for="phone">Phonenumber
                    <i id="i3" class="fas fa-phone"></i>
                    <input class="input" type="number" name="phone" placeholder="Phonenumber .." />
                </label>
                <label for="password"> Message
                    <i id="i44" class="fas fa-inbox"></i>
                    <textarea name="message" id="message" class="message" placeholder="Write Your Message .." cols="30" rows="10"></textarea>
                </label>
                <div class="button"><input type="submit" class="sub" name="create" id="create" value="Send"> </div>
            </form>
        </div>
    </div>
    <?php include('includes/footer.php');?>
