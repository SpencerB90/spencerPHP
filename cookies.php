<?php

$cookie_name = "last_visit";
$cookie_value = date("l jS \of F Y h:i:s A");// l -day of the week
//setcookie($cookie_name,$cookie_value, time() + (86400*30), "/");
//86400 = 1 day

if (isset($_COOKIE['last_visit']))
{
  $notification = "Hello again, you seem to like it here.";
  $last_visit = $_COOKIE['last_visit'];
  //$cookie_value = time();
  //$last_visit = $_COOKIE['last_visit'];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}
else {
  $notification = "First time visit yes?";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

if (isset($_COOKIE['last_visit']))
{
  $notification = "Here you were " . ((time()- $last_visit) / 60) . " seconds ago";
  // $change = time() - $cookie_value;
  // $visit_time = "Last time you were here " . $change . " seconds ago";
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>
      <?php
          echo $notification;
          echo ($last_visit != "")? "<br /> Last Visit: " . $last_visit : "";

       ?>
    </p>
  </body>
</html>
