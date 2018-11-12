<?php
//change paper kit 2 to any name like pofile would work and links to #

//changed nav bar

//things to do to build page

//make sure user is login in

//start session

//uses $_SESSION['email'] to display email in navigation

//edited the profile picture
//when user logs in it is there picture based off the url
//modify fm_user in our database to have table picture_url, avitar_url, image_url

//modify fm_user in our database to have tables for first_name and last_name

//modify fm_user to have a title $_SESSION['title'];

//modify fm_user to have description $_SESSION['description'];



session_start();
require('dbConnect.php');

$userID = $_SESSION['user_id'];

//create the sql Query
$sql1 = "SELECT * from fm_users;";
//exacute the sql query
$result = $conn->query($sql1);

//create the sql Query
$sql4 = "SELECT * from fm_users;";
//exacute the sql query
$result2 = $conn->query($sql4);


//following
$sql2 = "SELECT fm_following_user_id FROM fm_follows WHERE fm_user_id = $userID";
$following_result = $conn->query($sql2);
//indexes of user id's
while($row = $following_result->fetch_row()){
  $fm_following_user_id[] = $row[0];
}

//following me
$sql3 = "SELECT fm_user_id FROM fm_follows WHERE fm_following_user_id = $userID";
$following_me = $conn->query($sql3);

while ($row = $following_me->fetch_row()) {
  $following_me_me[] = $row[0];
}
?>





<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>profile by chaos</title>

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
	        <a class="navbar-brand" href="#">Profile</a>
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
  </nav> <!-- nav bar end     unset($_SESSION['email']   -->

    <div class="wrapper">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('../assets/img/fabio-mangione.jpg');">
			<div class="filter"></div>
		</div>
        <div class="section profile-content">
            <div class="container">
                <div class="owner">
                    <div class="avatar">
                        <img src="<?php echo $_SESSION['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive"><!-- image, replaced source-->
                    </div>
                    <div class="name">
                        <h4 class="title"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?><br /></h4><!-- first name last name -->
						<h6 class="description"><?php echo $_SESSION['title']; ?></h6> <!-- title-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <p><?php echo $_SESSION['description']; ?> </p> <!-- description-->
                        <br />
                        <btn class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Settings</btn>
                    </div>
                </div>
                <br/>
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Follows</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#following" role="tab">Following</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tab panes --> <!-- on profile make following show list of following, dont need checkboxes-->
                <div class="tab-content following"><!-- start for both-->

                    <div class="tab-pane active" id="follows" role="tabpanel"><!-- start following you-->

                      <?php while($row = $result->fetch_assoc()){

                     if (in_array($row['user_id'], $following_me_me)) {?>

                       <div class="row">
                         <div class="col-md-2 col-sm-2 ml-auto mr-auto">
         								<!-- image-->	<img src="<?php  echo  $row['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
         								</div>
         								<div class="col-md-7 col-sm-4  ml-auto mr-auto">
         							<!--name-->		<h6><?php echo $row['first_name'] . $row['last_name']; ?>

         							<!-- title-->	<br/><small><?php 	echo $row['title']; ?></small></h6>
         								</div>
                       </div>

                     <?php } ?>

                   <?php } ?>


                    </div> <!-- end following you-->

                    <div class="tab-pane text-center" id="following" role="tabpanel"><!-- list of you following-->

                      <?php while($row2 = $result2->fetch_assoc()){

                     if (in_array($row2['user_id'], $fm_following_user_id)) {?>

                       <div class="row">
                         <div class="col-md-2 col-sm-2 ml-auto mr-auto">
         								<!-- image-->	<img src="<?php  echo  $row2['image_url']; ?>" alt="Circle Image" class="img-circle img-no-padding img-responsive">
         								</div>
         								<div class="col-md-7 col-sm-4  ml-auto mr-auto">
         							<!--name-->		<h6><?php echo $row2['first_name'] . $row2['last_name']; ?>

         							<!-- title-->	<br/><small><?php 	echo $row2['title']; ?></small></h6>
         								</div>
                       </div>

                     <?php } ?>
                     
                   <?php } ?>

                 </div><!-- end following-->

                </div><!-- end of following both-->

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
