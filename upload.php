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
var_dump($_FILES['upload']);

echo"<hr />";
var_dump($_POST['upload']); //trouble shooting wrong statement

//code for uploading file, will work after post data is sent
if (isset($_FILES['upload']) ){ //could use != null after ] instead of isset
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES['upload']['name']);
  //moves files
  move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);

}


 ?>

 Upload your file.
</br>
 <!--info on w3schools-->
 <form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="upload">
 </br>
 </br>
 <input type="submit">

 </form>
