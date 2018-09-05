<?php
session_start();
require('dbconnect.php');

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<?php
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['logout'])) {
  unset($_SESSION['username']);
}
 ?>

  <body>
    <form method="post" action="">
      <input type="text" name="username" placeholder="enter username"> <br />
      <input type="password" name="password" >
      <br>
      <input type="submit" value="go">
      <br>
      <input type="submit" name="logout" value="logout">

    </form>

<?php
if (isset($username) && isset($password)) {
  if ($username == "spencer" && $password == "password"){
    $_SESSION['username'] = $username;
  }
}

echo "Logged in as: " . $_SESSION['username'];

 ?>

  </body>
</html>
