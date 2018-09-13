<?php
session_start();
require('dbConnect.php');
//can connect after not before, code goes line by line

if (isset($_POST['username'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  //SQL statement to execute. surround variables with single qoates
  $sql = "SELECT username, password FROM users where username = '$username'";
  //execute sql and return the array to $result
  $result = $conn->query($sql);

  //extracting the returned query information
  while ($row = $result->fetch_assoc()){
    // $row['username'] is value from database
    //username & password is the field name in database, use same name and capitalization
    if ($username == $row['username'] && password_verify($password, $row['password']) ){
      $_SESSION['username'] = $username;
    } //closes if statement

  } //closes while loop

}// closes POST condition
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

<?php

if(isset($_POST['logout'])) {
  unset($_SESSION['username']);
}
 ?>

  <body>

    <a href = "register.php">Register</a>
  <?php  if (isset($_SESSION['username'])) {
     <a href = "upload.php"> | Upload </a>
   }?>
    <br />


    <form method="post" action="">
      <input type="text" name="username" placeholder="enter username"> <br />
      <input type="password" name="password" >
      <br>
      <input type="submit" value="go">
      <br>
      <input type="submit" name="logout" value="logout">

    </form>

<?php
echo "Logged in as: " . $_SESSION['username'];
 ?>

  </body>
</html>
