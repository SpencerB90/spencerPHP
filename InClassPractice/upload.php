<?php
//checks to see if session is started
if (!isset($_SESSION)) {
  session_start();
}
//if username not in database, will move them to login page
if (!isset($_SESSION['username'])) {
  //die("Don't even try mate");
  //before html cant but put at bottom, must be at top
  //when you use header you need 'location: then where you are going to'
  header('Location: login.php'); //if you wanted https address you need full url
}

//takes whatever this is and tells you about it, good for trouble shooting
//var_dump($_FILES['upload']);

//echo"<hr />";
//post could have been changed from php 5 to 7
//var_dump($_POST['upload']); //trouble shooting wrong statement

//use ctrl / to auto comment by line

//code for uploading file, will work after post data is sent
if (isset($_FILES['upload']) ){ //could use != null after ] instead of isset
  //check to if uploads folder exists
  if (!file_exists("uploads")){
    //if uploads folder(directory) dose not exist create it
    mkdir("uploads/");
  }

  //creates file for individual user, 0777 permissions, true = recursive to create file path
  if (!file_exists("uploads/" . $_SESSION['username'])) {
    mkdir("uploads/" . $_SESSION['username'], 0777,true);
  }

  // makes upload files for user by username
  $target_dir = "uploads/" . $_SESSION['username'] . "/";
  $target_file = $target_dir . basename($_FILES['upload']['name']);

$uploadVerify = true;

//lets check to see if the file already exists

//variables are global
if (file_exists($target_file)) {
  $uploadVerify = false;
  $ret = "Sorry file already exists";
}

//check file for type
$file_type = $_FILES['upload']['type'];

switch ($file_type) {
  case 'image/jpeg':
    $uploadVerify = true;
    break;

  case 'image/png':
    $uploadVerify = true;
    break;

  case 'image/gif':
    $uploadVerify = true;
    break;

  case 'application/pdf':
    $uploadVerify = true;
    break;

  default:
    $uploadVerify = false;
    $ret = "sorry only jpeg, gif, png, and pdf files allowed";
    break;
}


//php has file upload limit of 2mb by default
if ($_FILES['upload']['size'] > 1000000 ) {
  $uploadVerify = false;
  $ret = "Sorry file too big";
}

//if set value has value can be used as true w/o conditions
if ($uploadVerify) {
  //moves files
    move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);
}
}


 ?>


 <?php
 if (isset($_SESSION['username'])) {
 require('navbar.php');
 }

  ?>



 <br />



 Upload your file.
</br>
 <!--info on w3schools-->
 <form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="upload">
 </br>
 </br>
 <input type="submit">

 </form>

 <h5 style="color:red;">
   <?php if ($ret) { echo $ret; } ?>
</h5>
