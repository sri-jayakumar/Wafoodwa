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
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$restaurants = getAllRestaurants();
		$types = getAllTypes();
		$toprestaurants = getTopThree(); 
		$topthreecounter = 0; 
		$count = 1;
		$typeToArray = new \stdClass();
	  } 
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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" type="image/icon" href="https://i.imgur.com/x4RA1ZT.png"/>
    <!-- Line icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Gallery Lightbox -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/custom-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="style.css" rel="stylesheet">
 
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  <!-- Start Header -->
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
					<li><a href="#mu-portfolio">RESTAURANTS</a></li>
		            <li><a href="#mu-team">OUR TEAM</a></li>
					<li><a href="export.php">EXPORT CSV</a></li>
		      	</ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		</div>
	</header>
	<!-- End Header -->
	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo "error alert";
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<?php 
			$_SESSION['followed'] = getFollowedRestaurants($_SESSION['username']);
		?>
    <?php endif ?>

	<!-- Start Featured Slider -->
	<section id="mu-featured-slider">
		<div class="row">
			<div class="col-md-12">
				<div class="mu-featured-slide">

					<!-- Start Single slide -->
					<div class="mu-featured-slider-single">
						<img src="assets/images/restaurants.jpg" height="600">
						<div class="mu-featured-slider-content">
							<h1>Welcome to Wafoodwa</h1>
							<p>Your perfect retaurant review application designed for UVA students about the best local Charlottesville restaurants.</p>
							<a href="#mu-portfolio" class="mu-primary-btn">Explore the Restaurants</a>
						</div>
					</div>
					<!-- End Single slide -->

					<!-- Start Single slide -->
					<div class="mu-featured-slider-single">
						<img src="assets/images/basil.jpg" height="600">
						<div class="mu-featured-slider-content">
							<h1>Basil Mediterranean Bistro</h1>
							<p>
								"One of the best dining experiences ever! I frequent visit Basil for lunch and 
								dinner with friends. The menu has so much to offer and the waitstaff is incredible! 
								Definitely worth the visit if you've never been!" - John B.
							</p>
						</div>
					</div>
					<!-- End Single slide -->

					<!-- Start Single slide -->
					<div class="mu-featured-slider-single">
						<img src="assets/images/bodos.jpg" height="600">
						<div class="mu-featured-slider-content">
							<h1>Bodo's Bagels Bakery</h1>
							<p>
								"A local favorite! Love how warm and fresh their bagels are. 
								Can't go wrong here." - Tricia C.
							</p>
						</div>
					</div>
					<!-- End Single slide -->

					<!-- Start Single slide -->
					<div class="mu-featured-slider-single">
					<a href=<?php echo "reviews.php?" . urlencode($toprestaurants[0]['restaurants_name'])?> title=<?php echo $toprestaurants[0]['restaurants_name'];?>>
						<img src= <?php echo $toprestaurants[0]['restaurants_featured_image'];?> height="600" width="2100">
						<div class="mu-featured-slider-content">
						<h1><?php echo $toprestaurants[0]['restaurants_name'];?></h1>
							<p>Globally Ranked Number #1 in Charlottesville</p>
						</div>
					</a>
					</div>
					<!-- End Single slide -->

					<!-- Start Single slide -->
					<div class="mu-featured-slider-single">
					<a href=<?php echo "reviews.php?" . urlencode($toprestaurants[1]['restaurants_name'])?> title=<?php echo $toprestaurants[1]['restaurants_name'];?>>
						<img src= <?php echo $toprestaurants[1]['restaurants_featured_image'];?> height="600" width="2100">
						<div class="mu-featured-slider-content">
						<h1><?php echo $toprestaurants[1]['restaurants_name'];?></h1>
							<p>Globally Ranked Number #2 in Charlottesville</p>
						</div>
					</a>
					</div>
					<!-- End Single slide -->

					<!-- Start Single slide -->
					<div class="mu-featured-slider-single">
					<a href=<?php echo "reviews.php?" . urlencode($toprestaurants[2]['restaurants_name'])?> title=<?php echo $toprestaurants[2]['restaurants_name'];?>>
						<img src= <?php echo $toprestaurants[2]['restaurants_featured_image'];?> height="600" width="2100">
						<div class="mu-featured-slider-content">
						<h1><?php echo $toprestaurants[2]['restaurants_name'];?></h1>
							<p>Globally Ranked Number #3 in Charlottesville</p>
						</div>
					</a>
					</div>
					<!-- End Single slide -->

				</div>
			</div>			
		</div>
	</section>
	
	<!-- End Featured Slider -->
	<!-- Start main content -->
		
	<main role="main">
		<!-- Start Portfolio -->
		<section id="mu-portfolio">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-portfolio-area">

							<div class="mu-portfolio-header">
								<h2 class="mu-heading-title"><span>RESTAURANTS</span></h2>
								<span class="mu-header-dot"></span>
								<p>Restaurants in the Charlottesville area</p>
							</div>

							<!-- Start Portfolio Filter -->
							<div class="mu-portfolio-filter-area">
								<ul class="mu-simplefilter">
									<li class="active" data-filter="all">All</li>
									<?php foreach ($types as $type):?>
										<?php if(!empty($type)){ ?>
											<li data-filter=<?php echo $count?>><?php echo $type?></li>
											<?php
												$typeToArray->$type = $count;  
												$count++;
											?>
										<?php }?>
									<?php endforeach; ?>
					            </ul>
							</div>

							<!-- Start Portfolio Content -->
							<div class="mu-portfolio-content">
								<div class="filtr-container">
									<?php foreach ($restaurants as $restaurant): ?>
										<?php
											$thumbnail = $restaurant['restaurants_featured_image'];
											$name = $restaurant['restaurants_name'];
											$establishment = $restaurant['restaurants_establishment'];
											if(!empty($establishment)){
												$category = $typeToArray->$establishment;
											} else {
												$category = "1";
											}
										?>
										<div class="col-xs-6 col-sm-4 col-md-4 filtr-item" data-category=<?php echo $category;?>>
											<a href=<?php echo "reviews.php?" . urlencode($name)?> title=<?php echo $name;?>>
												<img class="img-responsive" src=<?php 
														if(empty($thumbnail)){
															echo "assets/images/portfolio/img-1.jpeg";
														} else {
															echo $thumbnail;
														};
													?> alt="image" style="height:280px;width:640px;">
												<div class="mu-filter-item-content">
													<h4 class="mu-filter-item-title"><?php echo $name;?></h4>
												</div>
											</a>
										</div>
									<?php endforeach; ?>

					            </div>
							</div>
							<!-- End Portfolio Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Portfolio -->

		<!-- Start Team -->
		<section id="mu-team">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-team-area">

							<div class="mu-team-header">
								<h2 class="mu-heading-title">OUR <span>TEAM</span></h2>
								<span class="mu-header-dot"></span>
								<p>The developers responsible for making this website.</p>
							</div>

							<!-- Start Team Content -->
							<div class="mu-team-content">
								<div class="row">

									<!-- Team Single Content -->
									<div class="col-sm-6 col-md-4">
										<div class="mu-team-content-single">
											<div class="mu-team-profile">
												<img src="assets/images/sri.jpg" alt="team member">
												<div class="mu-team-social-info">
													<a href="https://github.com/sri-jayakumar"><i class="icon-social-github"></i></a>
													<a href="https://www.instagram.com/sri_jayakumar_17/"><i class="icon-social-instagram"></i></a>
													<a href="https://www.linkedin.com/in/sri-jayakumar-b7a357119/"><i class="icon-social-linkedin"></i></a>
												</div>
											</div>
											<div class="mu-team-info">
												<h4>Sri Jayakumar</h4>
												<span></span>
											</div>
										</div>
									</div>
									<!-- / Team Single Content -->
									
									<!-- Team Single Content -->
									<div class="col-sm-6 col-md-4">
										<div class="mu-team-content-single">
											<div class="mu-team-profile">
												<img src="assets/images/jane.jpg" alt="team member">
												<div class="mu-team-social-info">
													<a href="#"><i class="icon-social-facebook"></i></a>
													<a href="#"><i class="icon-social-twitter"></i></a>
													<a href="#"><i class="icon-social-linkedin"></i></a>
												</div>
											</div>
											<div class="mu-team-info">
												<h4>Jane Kim</h4>
												<span></span>
											</div>
										</div>
									</div>
									<!-- / Team Single Content -->
									
									<!-- Team Single Content -->
									<div class="col-sm-6 col-md-4">
										<div class="mu-team-content-single">
											<div class="mu-team-profile">
												<img src="assets/images/helen.jpg" alt="team member">
												<div class="mu-team-social-info">
													<a href="#"><i class="icon-social-facebook"></i></a>
													<a href="#"><i class="icon-social-twitter"></i></a>
													<a href="#"><i class="icon-social-linkedin"></i></a>
												</div>
											</div>
											<div class="mu-team-info">
												<h4>Helen Lin</h4>
												<span></span>
											</div>
										</div>
									</div>
									<!-- / Team Single Content -->

									<!-- Team Single Content -->
									<div class="col-sm-6 col-md-4">
										<div class="mu-team-content-single">
											<div class="mu-team-profile">
												<img src="assets/images/nik.jpg" alt="team member">
												<div class="mu-team-social-info">
													<a href="#"><i class="icon-social-facebook"></i></a>
													<a href="#"><i class="icon-social-twitter"></i></a>
													<a href="#"><i class="icon-social-linkedin"></i></a>
												</div>
											</div>
											<div class="mu-team-info">
												<h4>Nikhil Ramachandran</h4>
												<span></span>
											</div>
										</div>
									</div>
									<!-- / Team Single Content -->
									
									<!-- Team Single Content -->
									<div class="col-sm-6 col-md-4">
										<div class="mu-team-content-single">
											<div class="mu-team-profile">
												<img src="assets/images/am.jpg" alt="team member">
												<div class="mu-team-social-info">
													<a href="#"><i class="icon-social-facebook"></i></a>
													<a href="#"><i class="icon-social-twitter"></i></a>
													<a href="#"><i class="icon-social-linkedin"></i></a>
												</div>
											</div>
											<div class="mu-team-info">
												<h4>Amani Vohra</h4>
												<span></span>
											</div>
										</div>
									</div>
									<!-- / Team Single Content -->
									
									<!-- Team Single Content -->
									<div class="col-sm-6 col-md-4">
										<div class="mu-team-content-single">
											<div class="mu-team-profile">
												<img src="assets/images/selinie.jpg" alt="team member">
												<div class="mu-team-social-info">
													<a href="https://www.facebook.com/selinie777"><i class="icon-social-facebook"></i></a>
													<a href="#"><i class="icon-social-twitter"></i></a>
													<a href="https://www.linkedin.com/in/jun-yi-selinie-wang-063487187/"><i class="icon-social-linkedin"></i></a>
												</div>
											</div>
											<div class="mu-team-info">
												<h4>Selinie Wang</h4>
												<span></span>
											</div>
										</div>
									</div>
									<!-- / Team Single Content -->
								</div>
							</div>
							<!-- End Team Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Team -->

		<!-- Start Google Map -->
		<section id="mu-google-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d589888.4396405783!2d-82.41588603632052!3d32.866951223053896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f9f727a4ed30eb%3A0xf2139b0c5c7ae1ec!2sDooley+Branch+Rd%2C+Millen%2C+GA+30442%2C+USA!5e0!3m2!1sen!2sbd!4v1497376364225" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
		</section>
		<!-- End Google Map -->

	</main>
	
	<!-- End main content -->	
			
			
	<!-- Start footer -->
	<footer id="mu-footer" role="contentinfo">
			<div class="container">
				<div class="mu-footer-area">
					<p>&copy; Copyright <a rel="nofollow"> All right reserved.</p>
				</div>
			</div>

	</footer>
	<!-- End footer -->

	
	
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