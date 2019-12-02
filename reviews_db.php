<?php 
   require('connect_db_pdo.php');      // include code to connect to a database      
   require('res_db.php');           // include code to access and process a friend table 
   global $db;

   session_start(); 
   $review_text = $_POST['review_text'];
   $rating = $_POST['rating'];
   $restaurant_name = $_POST['restaurant_name'];
   $restaurant_name = urldecode($restaurant_name);
   $username = $_SESSION['username']; 
   $email = $_SESSION['email']; 

   $query = "INSERT INTO review(restaurant_name, review_text, student_email, username, rating) VALUES ('".$restaurant_name."', '$review_text', '$email','$username','$rating');";
   $query2 = "INSERT INTO writes(username, review_id) VALUES ('$username', LAST_INSERT_ID());";

   $statement = $db->prepare($query);
   $statement2 = $db->prepare($query2);

   $statement->execute();
   $statement2->execute();

   $statement->closeCursor();
   $statement2->closeCursor();


   header("Location: ./index.php?review=success");

?>