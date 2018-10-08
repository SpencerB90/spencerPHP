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
         $now = date();
         $then =  $visit - (86400 * 30);

         echo "Welcome back! <br> You last visited on " . $visit;
         // Tells the user when they last visited if it was over a day ago

         $timeDifference =  $now - $then;

         setcookie('lastVisit', date(), time() + (86400 * 30) , "/");
         //86400 = 1 day


         echo "<br> seconds since last visit " . $timeDifference;


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
