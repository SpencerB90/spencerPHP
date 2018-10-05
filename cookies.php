<?php
$cookie_name = "user";
$cookie_value = "pete";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <?php



       echo "Here first time, yes";
       //can run after html?

       date_default_timezone_set('America/New_York');
       setcookie($cookie_name, $cookie_value, time() + (60), "/");
       setcookie('lastVisit', date("G:i - m/d/y"), time() + (60), "/");
       //86400 = 1 day
     
     ?>


  </body>
</html>
