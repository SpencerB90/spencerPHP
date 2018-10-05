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

      if (isset($_COOKIE["user"])){

        $visit = $_COOKIE["lastVisit"];

        echo "Welcome back! <br> You last visited on ". $visit);
        // Tells the user when they last visited if it was over a day ago
      }
      else{
        echo "Here first time, yes";
        //can run after html?
        setcookie($cookie_name, $cookie_value, time() + (60), "/");
        setcookie('lastVisit', date("G:i - m/d/y"), time() + (60), "/");
        //86400 = 1 day
      }

      ?>



   </body>
 </html>
