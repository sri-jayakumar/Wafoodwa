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
        $reviews = getAllReviews("Doma");
	  }
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
		<form> 
			<div class="form-group">
			    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Write review here" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-primary my-1">Submit</button>
		</form>
		<hr> 
		<p> All reviews </p>
		<div class="filtr-container">
			<?php foreach ($reviews as $review): ?>
				<h4><?php echo $review['student_email'];?></h4>
				<h4><?php echo $review['rating'];?></h4>
			<?php endforeach; ?>
        </div>
	</div>
</body>
</html>