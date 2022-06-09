<!DOCTYPE html>
<html lang="ar" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>لوحة التحكم</title>
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
      document.addEventListener("touchstart", function() {},false);
      var mobileHover = function () {
    $('*').on('touchstart', function () {
        $(this).trigger('hover');
    }).on('touchend', function () {
        $(this).trigger('hover');
        });
    };
    mobileHover();
    </script>
  </head>
  <body>
    <style media="screen">
      .user-icon{
        background: hsl(<?php echo rand(0,361) ?>, 70%, 60%);
      }
    </style>
    <div class="wrapper">
      <div id="header">
        <div class="user" id="user">
          <div class="username"><?php echo $Ausername; ?>
         </div>
          <div class="user-icon-cont">
            <div class="user-icon" onclick="userMenuOpen();">
              <div class="user-letter"><?php echo $Ausername[0]; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="menu-button" id="menu-button" onclick="openSidebar()">
          <div class="menu-button-line"></div>
          <div class="menu-button-line"></div>
          <div class="menu-button-line"></div>
        </div>
        <div class="logo"></div></div>
      <div class="sidebar" id="sidebar">
        <a href="./index.php"><div class="button"><i class="fas fa-home"></i>الرئيسية</div></a>
        <a href="all-units.php"><div class="button"><i class="fas fa-building"></i>جميع الوحدات</div></a>
        <a href="all-complaints.php"><div class="button"><i class="fas fa-flag"></i>جميع الشكاوي</div></a>

      </div>
      <script type="text/javascript">
        function userMenuOpen(){
          var usericon = document.getElementById("user");
          if( usericon.classList.contains("open")){
            usericon.classList.remove("open");
          }
          else{
            usericon.classList.add("open");
          }
        }
      </script>
      <div class="main-body" id="main-body">
        <div class="container">
