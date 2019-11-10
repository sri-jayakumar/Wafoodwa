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
	  }
?>
<!DOCTYPE html>
<html lang="en">
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
 
 
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  <!-- Start Header -->
	<header id="mu-header" class="" role="banner">
		<div class="container">
			<nav class="navbar navbar-default mu-navbar">
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
			        <li><a href="#mu-about">ABOUT US</a></li>
			        <li><a href="#mu-service">SERVICES</a></li>
		            <li><a href="#mu-portfolio">Restaurants</a></li>
		            <li><a href="#mu-team">TEAM</a></li>
		            <li><a href="#mu-clients">OUR CLIENTS</a></li>
		            <li><a href="#mu-contact">CONTACT</a></li>
		      	</ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		</div>
	</header>
	<!-- End Header -->

	<!-- Start Featured Slider -->

	<section id="mu-featured-slider">
		<div class="row">
			<div class="col-md-12">
				<div class="mu-featured-slide">

					<!-- Start Single slide -->
					<div class="mu-featured-slider-single">
						<img src="assets/images/slider-img-1.jpg">
						<div class="mu-featured-slider-content">
							<h1>WELCOME TO BIZINESS</h1>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
							<a href="#" class="mu-primary-btn">CONTACT US</a>
						</div>
					</div>
					<!-- End Single slide -->

					<!-- Start Single slide -->
					<div class="mu-featured-slider-single">
						<img src="assets/images/slider-img-2.jpg">
						<div class="mu-featured-slider-content">
							<h1>WE PROMOTE YOUR BUSINESS</h1>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
							<a href="#" class="mu-primary-btn">CONTACT US</a>
						</div>
					</div>
					<!-- End Single slide -->

					<!-- Start Single slide -->
					<div class="mu-featured-slider-single">
						<img src="assets/images/slider-img-3.jpg">
						<div class="mu-featured-slider-content">
							<h1>FREE ONE PAGE TEMPLATE</h1>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
							<a href="#" class="mu-primary-btn">CONTACT US</a>
						</div>
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
								<p>Restaurants in the Charlotessville area</p>
							</div>

							<!-- Start Portfolio Filter -->
							<div class="mu-portfolio-filter-area">
								<ul class="mu-simplefilter">
					                <li class="active" data-filter="all">All</li>
					                <li data-filter="1">Web App</li>
					                <li data-filter="2">UI/UX</li>
					                <li data-filter="3">Graphics Design</li>
					                <li data-filter="4">Mobile App</li>
					                <li data-filter="5">Branding</li>
					                <li data-filter="6">Marketing</li>
					            </ul>
							</div>

							<!-- Start Portfolio Content -->
							<div class="mu-portfolio-content">
								<div class="filtr-container">
									<?php foreach ($restaurants as $restaurant): ?>
										<div class="col-xs-6 col-sm-4 col-md-4 filtr-item" data-category="1">
											<a href="reviews.php" title=<?php echo $restaurant['restaurants_name'];?>>
												<img class="img-responsive" src="assets/images/portfolio/img-1.jpeg" alt="image">
												<div class="mu-filter-item-content">
													<h4 class="mu-filter-item-title"><?php echo $restaurant['restaurants_name'];?></h4>
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
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
							</div>

							<!-- Start Team Content -->
							<div class="mu-team-content">
								<div class="row">

									<!-- Team Single Content -->
									<div class="col-sm-6 col-md-4">
										<div class="mu-team-content-single">
											<div class="mu-team-profile">
												<img src="assets/images/team-member-1.jpg" alt="team member">
												<div class="mu-team-social-info">
													<a href="#"><i class="icon-social-facebook"></i></a>
													<a href="#"><i class="icon-social-twitter"></i></a>
													<a href="#"><i class="icon-social-linkedin"></i></a>
												</div>
											</div>
											<div class="mu-team-info">
												<h4>Alice Boga</h4>
												<span>Graphics Designer</span>
											</div>
											
										</div>
									</div>
									<!-- / Team Single Content -->

									<!-- Service Single Content -->
									<div class="col-sm-6 col-md-4">
										<div class="mu-team-content-single">
											<div class="mu-team-profile">
												<img src="assets/images/team-member-2.jpg" alt="team member">
												<div class="mu-team-social-info">
													<a href="#"><i class="icon-social-facebook"></i></a>
													<a href="#"><i class="icon-social-twitter"></i></a>
													<a href="#"><i class="icon-social-linkedin"></i></a>
												</div>
											</div>
											<div class="mu-team-info">
												<h4>Jhon Doe</h4>
												<span>Web Developer</span>
											</div>
										</div>
									</div>
									<!-- / Service Single Content -->

									<!-- Service Single Content -->
									<div class="col-sm-6 col-md-4">
										<div class="mu-team-content-single">
											<div class="mu-team-profile">
												<img src="assets/images/team-member-3.jpg" alt="team member">
												<div class="mu-team-social-info">
													<a href="#"><i class="icon-social-facebook"></i></a>
													<a href="#"><i class="icon-social-twitter"></i></a>
													<a href="#"><i class="icon-social-linkedin"></i></a>
												</div>
											</div>
											<div class="mu-team-info">
												<h4>Emma Watson</h4>
												<span>Digital Marketer</span>
											</div>
										</div>
									</div>
									<!-- / Service Single Content -->


								</div>
							</div>
							<!-- End Team Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Team -->

		<!-- Start Testimonials -->
		<section id="mu-testimonials">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-testimonials-area">
							<h2 class="mu-heading-title">Client <span>Testimonials</span></h2>

							<div class="mu-testimonials-block">
								<ul class="mu-testimonial-slide">

									<li>
										<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever."</p>
										<h5 class="mu-ct-name"> - Jhon Doe</h5>
										<span class="mu-ct-title">CEO, Apple Inc.</span>
									</li>

									<li>
										<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever."</p>
										<h5 class="mu-ct-name"> - Alice Boga</h5>
										<span class="mu-ct-title">Director, Google Inc.</span>
									</li>

									<li>
										<p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever."</p>
										<h5 class="mu-ct-name"> - Jhon Smith</h5>
										<span class="mu-ct-title">Web Developer</span>
									</li>

								</ul>
							</div>


						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Testimonials -->

		
		<!-- Start Clients -->
		<section id="mu-clients">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-clients-area">

							<div class="mu-clients-header">
								<h2 class="mu-heading-title">OUR <span>CLIENTS</span></h2>
								<span class="mu-header-dot"></span>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
							</div>

							<!-- Start Clients Content -->
							<div class="mu-clients-content">
								<div class="row">

									<!-- Client Single Content -->
									<div class="col-sm-6 col-md-2">
										<div class="mu-clients-content-single">
											<img src="assets/images/client-logo-1.png" alt="brand image">
										</div>
									</div>
									<!-- / Client Single Content -->

									<!-- Client Single Content -->
									<div class="col-sm-6 col-md-2">
										<div class="mu-clients-content-single">
											<img src="assets/images/client-logo-2.png" alt="brand image">
										</div>
									</div>
									<!-- / Client Single Content -->

									<!-- Client Single Content -->
									<div class="col-sm-6 col-md-2">
										<div class="mu-clients-content-single">
											<img src="assets/images/client-logo-3.png" alt="brand image">
										</div>
									</div>
									<!-- / Client Single Content -->

									<!-- Client Single Content -->
									<div class="col-sm-6 col-md-2">
										<div class="mu-clients-content-single">
											<img src="assets/images/client-logo-5.png" alt="brand image">
										</div>
									</div>
									<!-- / Client Single Content -->

									<!-- Client Single Content -->
									<div class="col-sm-6 col-md-2">
										<div class="mu-clients-content-single">
											<img src="assets/images/client-logo-4.png" alt="brand image">
										</div>
									</div>
									<!-- / Client Single Content -->

									<!-- Client Single Content -->
									<div class="col-sm-6 col-md-2">
										<div class="mu-clients-content-single">
											<img src="assets/images/client-logo-6.png" alt="brand image">
										</div>
									</div>
									<!-- / Client Single Content -->

								</div>
							</div>
							<!-- End Clients Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Clients -->

		<!-- Start Contact -->
		<section id="mu-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-contact-area">

							<div class="mu-contact-header">
								<h2 class="mu-heading-title">CONTACT <span>US</span></h2>
								<span class="mu-header-dot"></span>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
							</div>

							<!-- Start Contact Content -->
							<div class="mu-contact-content">
								<div class="row">

									<div class="col-md-8">
										<div class="mu-contact-left">
										<div id="form-messages"></div>
											<form id="ajax-contact" method="post" action="mailer.php" class="mu-contact-form">
												<div class="form-group">                
													<input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
												</div>
												<div class="form-group">                
													<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
												</div>              
												<div class="form-group">
													<textarea class="form-control" placeholder="Message" id="message" name="message" required></textarea>
												</div>
												<button type="submit" class="mu-send-msg-btn"><span>SUBMIT</span></button>
								            </form>
										</div>
									</div>	

									<div class="col-md-4">
										<div class="mu-contact-right">
											<h4>Biziness</h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
											<address>
												<p><i class="icon-location-pin"></i>Dooley Branch Rd Millen, GA 30442, USA</p>
												<p><i class="icon-envelope"></i>contact@domain.com</p>
												<p><i class="icon-phone"></i>+90 987 678 9834</p>
											</address>
											<div class="mu-social-media">
												<a href="#"><i class="icon-social-facebook"></i></a>
												<a href="#"><i class="icon-social-twitter"></i></a>
												<a href="#"><i class="icon-social-google"></i></a>
												<a href="#"><i class="icon-social-linkedin"></i></a>
												<a href="#"><i class="icon-social-youtube"></i></a>
											</div>
										</div>
									</div>	

								</div>
							</div>
							<!-- End Contact Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact -->

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
					<p>&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right reserved.</p>
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