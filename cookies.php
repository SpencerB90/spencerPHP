<?php
$cookie_name = "user";
$cookie_value = "bob";

//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
//86400 = 1 day

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <?php

      if (isset($_COOKIE['user'])){
        echo "Before have you been";
      }
      else{
        echo "Here first time, yes";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        //86400 = 1 day
      }

      ?>

   </body>
 </html>
