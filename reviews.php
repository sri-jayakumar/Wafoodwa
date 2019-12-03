
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
	session_start();
	$name = $_SERVER['QUERY_STRING'];
	$onerest = getSpecificRestaurant($name);
	$rest_name = "";
	$is_following = FALSE;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" type="image/icon" href="https://i.imgur.com/x4RA1ZT.png"/>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
 
  </head>
	<title>Reviews</title>
</head>
<body>
	<header id="mu-header" class="" role="banner" >
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
		      <img src="https://i.imgur.com/XhBi4Kr.png" alt="wafoodwa icon" width="400">
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
	<h5>Restaurant</h5>
	<h5>Restaurant</h5>
	<h5>Restaurant</h5>
	&nbsp;
	<div class="container">
		<b><font size="7">
		<?php foreach ($onerest as $restaurant): ?>
			<p>
				<?php 
					$rest_name = $restaurant['restaurants_name'];
					if(count($_SESSION['followed']) > 0){
						foreach($_SESSION['followed'] as $rest){
							if($rest['restaurant'] == $rest_name){
								$is_following = TRUE;
							}
						}
					}	
					echo $rest_name;
				?> 
			</p>
		<?php endforeach; ?>
		</font></b>
		<?php foreach ($onerest as $restaurant): ?>
			<p><?php $thumbnail = $restaurant['restaurants_featured_image']; ?> </p>
			<img class="img-responsive" src=<?php 
				if(empty($thumbnail)){
					echo "assets/images/portfolio/img-1.jpeg";
				} else {
					echo $thumbnail;
				};
			?> alt="image" style="height:280px;width:640px;">
		<?php endforeach; ?>
		&nbsp;
		<?php
			if(isset($_POST['follow'])){
				followRestaurant(!$is_following, $_SESSION['username'], $rest_name);
				$_SESSION['followed'] = getFollowedRestaurants($_SESSION['username']);
				$is_following = !$is_following;
			}
		?>
		<form method="post">
			<input type="submit" name="follow" value=<?php echo ($is_following ? "Unfollow" : "Follow"); ?> />
		</form>
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
  			<tr>
    			<b><td align="left">Aggregate Review</td></b>
    			<td align="left">
    				<?php echo $restaurant['restaurants_user_rating_aggregate_rating'] . " out of 5"; ?>
    			</td>
  			</tr>
  			<tr>
    			<b><td align="left">Average Price for Two</td></b>
    			<td align="left">
    				<?php echo $restaurant['restaurants_average_cost_for_two']; ?>
    			</td>
  			</tr>
  			<tr>
    			<b><td align="left">Menu URL</td></b>
    			<td align="left">
    				<li><a href="<?php echo $restaurant['restaurants_menu_url']; ?>">Menu</a></li>
    			</td>
  			</tr>
		</table>
	<?php endforeach; ?>
	</div>
	&nbsp;

	<div class="container">
		<h1><font size="5">Reviews</font></h1>

		<form action = "reviews_db.php" method="POST"> 
			<div class="form-group">
				<p><label for="rating">Rating</label> 
					&nbsp;
					  <input type="radio" name="rating" value="5" /> 5 
					  &nbsp;
					  <input type="radio" name="rating" value="4" /> 4
					  &nbsp;
				      <input type="radio" name="rating" value="3" /> 3 
				      &nbsp;
				      <input type="radio" name="rating" value="2" /> 2
				      &nbsp; 
				      <input type="radio" name="rating" value="1" /> 1
				</p>
			    <textarea class="form-control" id="exampleFormControlTextarea1" name="review_text" placeholder="Write your review here" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-primary my-1">Submit</button>
			<input type="hidden" name="restaurant_name" value=<?php echo $name?> id="restaurant_name">
		</form>
		<hr>
		<?php     
			$reviews = getAllReviews($onerest[0]['restaurants_name']);
		?>
		<?php foreach ($reviews as $review): ?>
			<p><strong><?php echo $review['username']; ?> </strong></p>
			<p><strong> Review: </strong><?php echo addslashes($review['review_text']); ?> </p>
			<p><strong> Rating: </strong><?php echo $review['rating']; ?> out of 5</p>
			<hr>
		<?php endforeach; ?>
		&nbsp;
	</div>
	<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
	<!-- Slick slider -->
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <!-- Counter js -->
    <script type="text/javascript" src="assets/js/counter.js"></script>
    <!-- Filterable Gallery js -->
    <script type="text/javascript" src="assets/js/jquery.filterizr.min.js"></script>
    <!-- Gallery Lightbox -->
    <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="assets/js/app.js"></script>
    
	
    <!-- Custom js -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html>
