<?php
//must be in caps!
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require('dbConnect.php');


  // //to create the table if it isnt one copied off matts code // unfinished
  //   $sql = "SELECT * FROM fm_users";
  //   $checkForTable = $conn->query($sql);
  //
  //   if (mysqli_num_rows($checkForTable) < 1) {
  //     $sql = "CREATE TABLE IF NOT EXISIT fm_users {
  //     userid INT AUTO_INCREMENT,
  //     email VARCHAR(225),
  //     password VARCHAR(255),
  //     PRIMARY KEY(userid)
  //     }";
  //
  //     $tableCreate = $conn->query($sql);
  //  }

  //grab post data. could be dangerous because of xss or sql injection
  $email = $_POST['email'];

  //sanitize the email by removing tags
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

  //trim any white space from the $email, but not from middle, only beggining and end
  $email = trim($email);

  //remove slashes from $email, no \ allowed
  //$username = stripslashes($email);

  //try to get rid of / and \ characters
  $email = str_replace("/","", $email);
  $email = str_replace("\\","", $email);

  //remove white space from middle of string
  //first parameter ('is string to look for','second is what to replace with', on what)
  //$username = str_replace(' ','',$email);

  //for patterns, to get rid of tabs
  $email = preg_replace("/\s+/","", $email);

  //grab post data .. password will be hashed so no need to sanitize
  $password = $_POST['password'];

  // password hash wont work on red hat till new version
  //MD5 instentanious, bad for security - "rainbow table" = hashed guesses
  //hash is : takes password through algorythem and brings back a hash
  // impossible to reverse! good for security - BCRYPT "salts passwords"
  $password = password_hash($password, PASSWORD_BCRYPT);
  $sql = "INSERT INTO fm_users (email,password) VALUES ('$email','$password')";
  $conn->query($sql);
  header('location: login.php');
}

session_start();
?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>register by chaos</title>

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
    <nav class="navbar navbar-expand-md fixed-top navbar-transparent">
        <div class="container">
			<div class="navbar-translate">
	            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
	            </button>
	            <a class="navbar-brand" href="login.php">Login</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
					        <li class="nav-item">
	                    <a href="../index.html" class="nav-link"><i class="nc-icon nc-layout-11"></i>Components</a>
	                </li>

	            </ul>
	        </div>
		</div>
    </nav>
    <div class="wrapper">
        <div class="page-header" style="background-image: url('../assets/img/login-image.jpg');">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 ml-auto mr-auto">
                            <div class="card card-register">
                                <h3 class="title">Welcome</h3>
								<div class="social-line text-center">
                                    <a href="#pablo" class="btn btn-neutral btn-facebook btn-just-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-neutral btn-google btn-just-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
									<a href="#pablo" class="btn btn-neutral btn-twitter btn-just-icon">
										<i class="fa fa-twitter"></i>
									</a>




                                </div>
                                <form class="register-form" method="post" action="">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email">

                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <button class="btn btn-danger btn-block btn-round">Register</button>
                                </form>
                                <div class="forgot">
                                    <a href="#" class="btn btn-link btn-danger">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="footer register-footer text-center">
						<h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Chaos</h6>
					</div>
                </div>
        </div>
    </div>
</body>

<!-- Core JS Files -->
<script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="../assets/js/tether.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Paper Kit Initialization snd functons -->
<script src="../assets/js/paper-kit.js?v=2.0.1"></script>

</html>
