<?php
//must be in caps!
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require('dbConnect.php');
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "INSERT INTO users (username,password) VALUES ('$username','$password')";
  $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form action="" method="post">
      <input type="text" name="username"><br>
      <input type="password" name="password"><br>
      <input type="sumbit">
    </form>

  </body>
</html>
