<?php
$cookie_name = "user";
$cookie_value = "bob";

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
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
        echo "you have been here before";
      }
      else{
        echo "this is your first time here";
      }

      ?>

   </body>
 </html>
