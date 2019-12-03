<?php 
   require('connect_db_pdo.php');      // include code to connect to a database      
   require('res_db.php');           // include code to access and process a friend table 
   global $db;

   session_start(); 
   $review_text = addslashes($_POST['review_text']);
   $rating = $_POST['rating'];
   $restaurant_name = $_POST['restaurant_name'];
   $restaurant_name = addslashes(urldecode($restaurant_name));
   $username = $_SESSION['username']; 
   $email = $_SESSION['email']; 

   $query = "INSERT INTO review(restaurant_name, review_text, student_email, username, rating) VALUES ('$restaurant_name', '$review_text', '$email','$username','$rating');";

   $statement = $db->prepare($query);

   $statement->execute();

   $statement->closeCursor();

   $encode = urlencode($restaurant_name);
   header("Location: ./reviews.php?" . $encode);

?>