<?php
//must be in caps!
  session_start();
  require('dbConnect.php');


  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    unset($_SESSION['email']);

    header('location: login.php');
  }

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



	<title>logout by Chaos</title>

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
	            <a class="navbar-brand" href="#">Logout</a>

			</div>
			<div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
					        <li class="nav-item">
	                    <a href="#" class="nav-link"><i class="nc-icon nc-layout-11"></i>Components</a>
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
                                <h3 class="title"><?php echo $_SESSION['email']; ?></h3>

                                <form class="register-form" method="post" action="">
                                    <img src="<?php echo $_SESSION['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    <button class="btn btn-danger btn-block btn-round">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
					          <div class="footer register-footer text-center">
						           <h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Choas</h6>
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
