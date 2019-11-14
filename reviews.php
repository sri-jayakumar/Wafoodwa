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
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />  

	<title>Reviews</title>
</head>
<body>
	<div class="container">
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
			<input type="hidden" name="restaurant_name" value="actual_restaurant_name" id="restaurant_name">
		</form>
	</div>
</body>
</html>
