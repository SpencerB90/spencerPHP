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
       if (isset($_COOKIE['user']))
       {
         date_default_timezone_set('America/New_York');
         $visit = $_COOKIE['lastVisit'];
         $now = time();

         echo "Welcome back! <br> You last visited on " . $visit;
         // Tells the user when they last visited if it was over a day ago

         setcookie('lastVisit', date("G:i - m/d/y"), time() + (86400 * 30) , "/");
         //86400 = 1 day

         $since = $now - strtotime($visit);


         echo "<br> time since last visit " . $since;


       }
       else
       {
         echo "Here first time, yes";
         //can run after html?
         date_default_timezone_set('America/New_York');
         setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
       }

     ?>


  </body>
</html>
