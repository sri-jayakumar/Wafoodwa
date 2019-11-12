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