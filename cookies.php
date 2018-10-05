<?php


$cookie_name = "user";
$cookie_value = "here";



 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <?php

      if (isset($_COOKIE["user"])){

        $last = $_COOKIE["lastVisit"]; }

        $month = (86400 * 30) + time();

        echo "Welcome back! <br> You last visited on ". date("m/d/y",$last) ;
        // Tells the user when they last visited if it was over a day ago
      }
      else{
        echo "Here first time, yes";
        //can run after html?
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        setcookie('lastVisit', date("G:i - m/d/y"), time() + (60), "/");
        //86400 = 1 day
      }

      ?>



   </body>
 </html>
