<?php
//must be in caps!
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require('dbConnect.php');

  //grab post data. could be dangerous because of xss or sql injection
  $username = $_POST['username'];

  //sanitize the username by removing tags
  $username = filter_var($username, FILTER_SANITIZE_STRING);

  //trim any white space from the $username, but not from middle, only beggining and end
  $username = trim($username);

  //remove slashes from $username, no / allowed
  $username = stripslashes($username);

  //remove white space from middle of string
  //first parameter ('is string to look for','second is what to replace with', on what)
  $username = str_replace(' ','',$username);

  //grab post data .. password will be hashed so no need to sanitize
  $password = $_POST['password'];

  // password hash wont work on red hat till new version
  //MD5 instentanious, bad for security - "rainbow table" = hashed guesses
  //hash is : takes password through algorythem and brings back a hash
  // impossible to reverse! good for security - BCRYPT "salts passwords"
  $password = password_hash($password, PASSWORD_BCRYPT);
  $sql = "INSERT INTO users (username,password) VALUES ('$username','$password')";
  $conn->query($sql);
  header('location: login.php');
}

session_start();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <a href = "register.php">Register</a>
    <a href = "login.php"> | Login</a>


    <br />


    <form method="post" action="" >
      username:<input type="text" name="username"><br>
      password:<input type="password" name="password"><br>
      <input type="submit">
    </form>

  </body>
</html>
