<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<?php
$username = $_GET['username'];
$password = $_GET['password'];
 ?>

  <body>
    <form method="get" action="">
      <input type="text" name="username" placeholder="enter username"> <br />
      <input type="password" name="Password" >
      <br>
      <input type="submit" value="go">
    </form>

<?php
echo "username was " + $username;
echo "<br>";
echo "password was" + $password;

 ?>

  </body>
</html>
