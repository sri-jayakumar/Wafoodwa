<?php
// include -- include code from a specified php file into this file
//            if the specified file is not found, include produces a warning message
//            the rest of the script will run 
// include('connect_db_pdo.php');
// include('friend_db.php');
// require -- include code from a specified php file into this file
//            if the specified file is not found, require produces a fatal error
//            the rest of the script won't run
require('connect_db_pdo.php');      // include code to connect to a database      
require('res_db.php');           // include code to access and process a friend table 
$action = "view_friend";        // default action
?>
<?php
	$name = $_SERVER['QUERY_STRING'];
	$onerest = getSpecificRestaurant($name);
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
 
 
	<title>Reviews</title>
	<style> 
	img{
		width: 50%;
	}

	.container{
		margin-top: 5%;
	}

	.btn{
		margin-bottom: 2%;
	}

	</style>
</head>
<body>
	<header id="mu-header" class="" role="banner">
		<div class="container">
			<nav class="navbar navbar-default navbar-fixed-top mu-fixed-nav" style="background-color:black;">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>

		      <!-- Text Logo -->
		      <a class="navbar-brand" href="#">Wafoodwa</a>

		      <!-- Image Logo -->
		      <!-- <a class="navbar-brand" href="#"><img src="assets/images/logo.png"></a> -->


		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav mu-menu navbar-right">
			        <li><a href="#">HOME</a></li>
		            <li><a href="profile.php">PROFILE</a></li>
		            <li><a href="login.php">LOGIN</a></li>
		            <li><a href="signup.php">SIGNUP</a></li>
		            <li><a href="#mu-contact">CONTACT</a></li>
		      	</ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		</div>
	</header>
	<div class="row">
		<div class="container column">
			<b><font size="7"
			<?php foreach ($onerest as $restaurant): ?>
				<p><?php echo $restaurant['restaurants_name']; ?> </p>
			<?php endforeach; ?>
			</font></b>

			<?php foreach ($onerest as $restaurant): ?>
				<img src="<?php echo $restaurant['restaurants_featured_image']; ?>">
			<?php endforeach; ?>
			<h1><font size="5">Details</font></h1>
			<?php foreach ($onerest as $restaurant): ?>

			<table width="500px" height="100px">
	  			<tr>
	    			<td align="left">Restaurant Address</td> 
	    			<td align="left">
	    				<?php echo $restaurant['restaurants_location_address']; ?>
	    			</td>
	  			</tr>
	  			<tr>
	    			<b><td align="10px">Phone Number</td></b>
	    			<td align="left">
	    				<?php echo $restaurant['restaurants_phone_numbers']; ?>
	    			</td>
	  			</tr>
	  			<tr>
	    			<b><td align="left">Cuisine Type</td></b>
	    			<td align="left">
	    				<?php echo $restaurant['restaurants_cuisines']; ?>
	    				</td>
	  			</tr>
	  			<tr>
	    			<b><td align="left">Price Range</td></b>
	    			<td align="left">
	    				<?php echo $restaurant['restaurants_price_range'] . " out of 5"; ?>
	    			</td>
	  			</tr>
			</table>
		<?php endforeach; ?>
		</div>
	</div>

	<div class="container">
		<form action = "reviews_db.php" method="POST"> 
			<div class="form-group">
				<p><label for="rating">Rating</label> 
					  <input type="radio" name="rating" value="5" /> 5 
					  <input type="radio" name="rating" value="4" /> 4
				      <input type="radio" name="rating" value="3" /> 3 
				      <input type="radio" name="rating" value="2" /> 2 
				      <input type="radio" name="rating" value="1" /> 1
				</p>
			    <textarea class="form-control" id="exampleFormControlTextarea1" name="review_text" placeholder="Write your review here" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-primary my-1">Submit</button>
			<input type="hidden" name="restaurant_name" value=<?php echo $name?> id="restaurant_name">
		</form>
	</div>
</body>
</html>
