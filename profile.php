<?php
require('connect_db_pdo.php');      // include code to connect to a database      
require('res_db.php');           // include code to access and process a friend table 
?>
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Biziness : Home</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/imges/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Line icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Gallery Lightbox -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <!-- Montserrat for Title -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 
	<title>User Profile</title>

  <style> 

  .content{
    margin-top: 8%;
  }



  img{
    width: 20%;
  }

</style>
</head>
<body>
  <header id="mu-header" class="" role="banner">
    <div class="container">
      <nav class="navbar navbar-default navbar-fixed-top mu-fixed-nav" style="background-color:black;">
      <div class="container-fluid navbar1">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Text Logo -->
          <a class="navbar-brand" href="index.php">Wafoodwa</a>

          <!-- Image Logo -->
          <!-- <a class="navbar-brand" href="#"><img src="assets/images/logo.png"></a> -->


        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav mu-menu navbar-right">
			        <li><a href="index.php">HOME</a></li>
		            <li><a href="profile.php">PROFILE</a></li>
					<li><a href="index.php#mu-portfolio">RESTAURANTS</a></li>
		            <li><a href="index.php#mu-team">OUR TEAM</a></li>
					<li><a href="export.php">EXPORT CSV</a></li>
		      	</ul>
		    </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    </div>
  </header>
	<div class="content container">
    <img src="assets/images/profile_pic.png">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>! </p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>

    <h1>Following:</h1>
    <?php foreach($_SESSION['followed'] as $restaurant):?>
      <a href=<?php echo "reviews.php?" . urlencode($restaurant['restaurant'])?> title=<?php echo $restaurant['restaurant'];?>>
        <?php echo $restaurant['restaurant']?>
      </a>
      <br>
    <?php endforeach;?>
</div>
</body>
</html>