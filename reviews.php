<?php
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
	<title>Restaurant Name</title>
</head>
<body>
	<div class="container">
		<b><font size="7"
		<?php foreach ($onerest as $restaurant): ?>
			<p><?php echo $restaurant['restaurants_name']; ?> </p>
		<?php endforeach; ?>
		</font></b>
		<?php foreach ($onerest as $restaurant): ?>
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
		<!--
    	<?php echo $restaurant['restaurants_menu_url']; ?>
		<?php endforeach; ?>
		-->
		<h2> </h2>
		<h2> </h2>
		<h1><font size="5">Reviews</font></h1>
		<form> 
			<div class="form-group">
			    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Write review here" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-primary my-1">Submit</button>
		</form>
		<hr> 
		<p> All reviews </p>
		<!--
		<div class="filtr-container">
			<?php foreach ($reviews as $review): ?>
				<h4><?php echo $review['student_email'];?></h4>
				<h4><?php echo $review['rating'];?></h4>
			<?php endforeach; ?>
        </div>
    	-->
	</div>
</body>
</html>