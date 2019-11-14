<?php 
   require('connect_db_pdo.php');      // include code to connect to a database      
   require('res_db.php');           // include code to access and process a friend table 
   global $db;

   $review_text = $_POST['review_text'];
   $rating = $_POST['rating'];

   $query = "INSERT INTO review(review_id, restaurant_name, review_text, student_email, rating) VALUES ('544354', 'Aberdeen Barn', '$review_text', 'hl5ec@virginia.edu', '$rating');";
   $statement = $db->prepare($query);
   $statement->execute();     // if the statement is successfully executed, execute() returns true
                              // false otherwise 
   $statement->closeCursor();
   header("Location: ../index.php?review=success");
?>