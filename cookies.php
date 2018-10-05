<?php

session_start();
require('dbConnect.php');

$cookie_name = $username;
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

      if (isset($_COOKIE[$username])){
        $last = $_COOKIE[$username]; }
        $month = (86400 * 30) + time();
        //this adds one year to the current time, for the cookie expiration
        setcookie(AboutVisit, time (), $month) ;
        if (isset ($last))
        {
        $change = time () - $last;
        if ( $change > 86400 - 24)
        {
        echo "Welcome back! <br> You last visited on ". date("m/d/y",$last) ;
        // Tells the user when they last visited if it was over a day ago
      }
      else{
        echo "Here first time, yes";
        //can run after html?
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        //86400 = 1 day
      }

      ?>



   </body>
 </html>
