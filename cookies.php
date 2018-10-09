
<?php
$cookie_name = "user";
$cookie_value = mktime();
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

         $seconds = $_COOKIE['user'];
         $current = mktime();
         $secondsCalc = ($current - $seconds);

        


         echo "<br> seconds since last visit " . $secondsCalc;


       }
       else
       {
         echo "Here first time, yes";
         //can run after html?

         setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
       }


     ?>


  </body>
</html>
