<?php
//Start Session if it is not running
//Add name attributes to form elements
//Set default values for each form element from $_SESSION
//Update submitted values to database
//Upldate submitted values to $_SESSION


if (!isset($_SESSION)) {
  session_start();
}
require('dbConnect.php'); //bring in database connection

//for if not logged in
  if (!isset($_SESSION['email'])){
    header('location: login.php');
  }


//create the sql Query
$sql2 = "SELECT * from fm_users;";
//exacute the sql query
$result2 = $conn->query($sql2);

$user_id = $_SESSION['user_id'];

//i would grab the post data once the button is clicked

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

  while ($row2 = $result2->fetch_assoc()) {

    $userID = $row2['user_id'];

    if ($_POST["$userID"] == "yes") {

      $followID = $row2['user_id'];
      $sql2 = "INSERT IGNORE INTO fm_follows(fm_user_id, fm_following_user_id) VALUES ('$user_id', '$followID')";
      $conn->query($sql2);

    }
else {

    $followID = $row2['user_id'];
    $sql2 = "DELETE FROM fm_follows WHERE fm_user_id = '$user_id' AND fm_following_user_id = '$followID'";
    $conn->query($sql2);
    }

    // after you add will take you back to profile page
    header('location: profile.php');
  }

//assign values to each of them and put into an array of following userids
//hopefully i will be able to grab weither they are checked or unchecked and and put them into sepearte arrays

//i would then use the unchecked array to unfollow any users that i had followed before

//still need to work on how to get those into arrays


//then i would update the userid that are being follwoed into the system


//if  that would go well then the statement under would update the page list

}

$sql = "SELECT * from fm_users;";
//exacute the sql query
$result = $conn->query($sql);

$sql = "SELECT fm_following_user_id FROM fm_follows WHERE fm_user_id = $user_id";

$following_result = $conn->query($sql);

//indexes
while($row = $following_result->fetch_row()){

  $fm_following_user_id[] = $row[0];
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Users by Chaos</title>

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
	       <a class="navbar-brand" href="#">Users</a>
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
	            </ul>
	        </div>
		</div>
    </nav>

    <div class="wrapper">
      <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
			  <div class="filter"></div>
		  </div>~

			<br />
			<br />

    <form method="post" action="">

			<div class="row">
				<div class="col-md-6 ml-auto mr-auto">
					<ul class="list-unstyled follows">
						 <?php while($row = $result->fetch_assoc()){ ?>
						<li>
							<div class="row">
								<div class="col-md-2 col-sm-2 ml-auto mr-auto">
								<!-- image-->	<img src="<?php  echo  $row['image_url'] ; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
								</div>
								<div class="col-md-7 col-sm-4  ml-auto mr-auto">
							<!--name-->		<h6><?php echo $row['first_name'] . $row['last_name'] ; ?>

							<!-- title-->	<br/><small><?php 	echo $row['title'] ; ?></small></h6>
								</div>
								<div class="col-md-3 col-sm-2  ml-auto mr-auto">
									<div class="form-check">
										<label class="form-check-label"><!--echo if checked only if followed -->
											<input class="form-check-input" type="checkbox" name="<?php echo $row['user_id'];?>" value="yes" <?php if (in_array($row['user_id'], $fm_following_user_id)){echo "checked";}?> >
											<span class="form-check-sign"></span>
										</label>
									</div>
								</div>
							</div>
						</li>
						<hr />
					<?php } ?>
					</ul>
				</div>
			</div>


      <div class="row">
          <div class="col-md-4 ml-auto mr-auto text-center">
              <button class="btn btn-danger btn-lg btn-fill">Submit</button>
          </div>
      </div>

    </form>
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
