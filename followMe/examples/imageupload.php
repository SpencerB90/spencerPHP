<?php
if (!isset($_SESSION)) {
  session_start();
}


//changes
/*
start session if not
add name value attributes to form elements
set default values for each form element for $_SESSION
update submitted values to database
update submitted values to $_SESSION




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




if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  require('dbConnect.php');

*/

 ?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>by chaos</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/nucleo-icons.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
        <div class="container">
			<div class="navbar-translate">
	            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
	            </button>
	            <a class="navbar-brand" href="#">Edit Picture</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                   <a href="logout.php" class="nav-link">Logout</a>
               </li>
                <li class="nav-item">
                   <a href="profile.php" class="nav-link">Profile</a>
               </li>
                <li class="nav-item">
                   <a href="editprofile.php" class="nav-link">Edit Profile</a>
               </li>
                  <li class="nav-item">
                      <a href="users.php" class="nav-link">Users</a>
                  </li>
                  <li class="nav-item">
                   <a href="#" class="nav-link">
                     <?php echo $_SESSION['email']; ?>
                   </a>
               </li>
                  </li>
	            </ul>
	        </div>
		</div>
  </nav> <!-- nav bar end-->

    <div class="wrapper">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
			<div class="filter"></div>
		</div>
    <!-- pasted in here-->

    <div class="section landing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center">Image Upload</h2> <!-- turned to edit profil -->
                    <form class="contact-form" action="" method="POST"> <!-- added in action and method-->
                        <div class="row"><!--starts row-->

                        <input type="file" name="upload">
                        </br>
                        </br>
                        <input type="submit">

                        </div><!-- ends row-->

                    </form>

                </div>
            </div>
        </div>
    </div>

    </div>
	<footer class="footer section-dark">
        <div class="container">
            <div class="row">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                        <li><a href="http://blog.creative-tim.com">Blog</a></li>
                        <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
                    </ul>
                </nav>
                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Chaos
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.1.0"></script>

</html>
