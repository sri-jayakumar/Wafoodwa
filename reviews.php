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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />  
	<title>Reviews</title>

<style> 
h4{
	margin-top: 4%;
}

</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">WAFOODWA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
    </ul>
  </div>
</nav>

	<div class="container">
		<b><font size="7"
		<?php foreach ($onerest as $restaurant): ?>
			<p><?php echo $restaurant['restaurants_name']; ?> </p>
		<?php endforeach; ?>
		</font></b>

		<?php foreach ($onerest as $restaurant): ?>
			<p><?php $thumbnail = $restaurant['restaurants_featured_image']; ?></p>
			<img class="img-responsive" src=<?php
				if (empty($thumbnail)) {
					echo "assets/images/portfolio/imag-1.jpeg";
				} else {
					echo $thumbnail;
				};
			?> alt="image" style="height:280px;width:640px;">
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

	<div class="container">
		<h4> Review</h4>

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
		<hr>
		<?php     
			$reviews = getAllReviews($onerest[0]['restaurants_name']);
		?>
		<?php foreach ($reviews as $review): ?>
			<p><strong><?php echo $review['student_email']; ?> </strong></p>
			<p><strong> Review: </strong><?php echo $review['review_text']; ?> </p>
			<p><strong> Rating: </strong><?php echo $review['rating']; ?> out of 5</p>
			<hr>
		<?php endforeach; ?>
		
	</div>
</body>
</html>
