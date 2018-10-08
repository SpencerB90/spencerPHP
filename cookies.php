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

         $then = $visit;

         echo "Welcome back! <br> You last visited on " . $visit;
         // Tells the user when they last visited if it was over a day ago






   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $then;
       $tense         = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
       $periods[$j].= "s";
   }









         setcookie('lastVisit', date("G:i - m/d/y"), time() + (86400 * 30) , "/");
         //86400 = 1 day


         echo "<br> seconds since last visit " . $difference $periods[$j] 'ago' ;


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
