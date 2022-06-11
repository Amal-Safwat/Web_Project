<?php
session_start();
include('classes/DB.php');
include('classes/Login.php');
 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>EGway Airline</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="layout/css/master.css">
  </head>
  <body>
    <div id="header">
      <div class="logo">
          <img src="layout/png/logo.png">
      </div>
      <div class="nav">
  <style>a { text-decoration: none;} </style>

      <?php
        if (Login::isLoggedIn()) 
        {
            $typeCondition = 1;
            if($typeCondition == 'c')
            {
              $type = 2;
            }
            elseif ($typeCondition == 1){
              $type = 1;
            }

            print "<a href='index.php'><div class='item'><i class='fas fa-home'></i> Home  </div></a>";
            print "<a href='contact.php'><div class='item'><i class='fas fa-phone'></i>Contact Us </div></a>";
            if($type == 2)
            {
              print "<a href='addnew.php'><div class='item'><i class='fas fa-plus'></i> Add Trip </div></a>";
              print "<a href='myads.php'><div class='item'><i class='fas fa-plus'></i> Added Trips</div></a>";
            
            print "<a href='signout.php'><div class='item'><i class='fas fa-door-open'></i> Sign Out</div></a>";
            }
        } 
        else
        {
            print "<a href='index.php'><div class='item'><i class='fas fa-home'></i> Home  </div></a>";
            print "<a href='signin.php'><div class='item'><i class='fas fa-sign-in-alt'></i> Sign In</div></a>";
            print "<a href='signup.php'><div class='item'><i class='fas fa-user-plus'></i> Sign Up </div></a>";
            print "<a href='contact.php'><div class='item'><i class='fas fa-phone'></i>Contact Us</div></a>";
        }
      ?>
      </div>
    </div>
