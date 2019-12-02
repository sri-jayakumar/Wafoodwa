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
</head>
<body>
	<div class="container">
		<b><font size="7"
		<?php foreach ($onerest as $restaurant): ?>
			<p><?php echo $restaurant['restaurants_name']; ?> </p>
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
			<p><?php echo $restaurant['restaurants_featured_image']; ?> </p>
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

		<h1><font size="5">Reviews</font></h1>
		<h1> Restaurant Name </h1>
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