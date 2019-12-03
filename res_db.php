<?php 

// create table friend 
// (friendName varchar(60) PRIMARY KEY,
//  phone varchar(12))

// Prepared statement (or parameterized statement) happens in 2 phases: 
//   1. prepare() sends a template to the server, the server analyzes the syntax
//                and initialize the internal structure. 
//   2. bind value (if applicable) and execute 
//      bindValue() fills in the template (~fill in the blanks.
//                For example, bindValue(':name', $name); 
//                the server will locate the missing part signified by a colon
//                (in this example, :name) in the template 
//                and replaces it with the actual value from $name.
//                Thus, be sure to match the name; a mismatch is ignored. 
//      execute() actually executes the SQL statement
function getSpecificRestaurant($rest)
{
   global $db;
   $rest = urldecode($rest);
   $query = "SELECT * FROM restaurant WHERE restaurants_name = " . "\"" . $rest . "\"";
   $statement = $db->prepare($query); 
   $statement->execute();
   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();
   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();
   return $results;
}

function getAllReviews($restaurant)
{
   $escaped_restaurant = addslashes($restaurant);
   global $db;
   $query = "SELECT * FROM review WHERE restaurant_name = '$escaped_restaurant'";
   $statement = $db->prepare($query); 
   $statement->execute();

   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();

   return $results;
}

function getFollowedRestaurants($username)
{
   global $db;
   $query = "SELECT * FROM follow WHERE follower = '$username'";
   $statement = $db->prepare($query); 
   $statement->execute();

   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();

   return $results;
}

function followRestaurant($follow, $username, $restaurant)
{
   $escaped_restaurant = addslashes($restaurant);
   global $db;
   if($follow){
      $query = "INSERT INTO follow(follower, restaurant) VALUES ('$username', '$escaped_restaurant')";
   } else {
      $query = "DELETE FROM follow WHERE follow.follower = '$username' AND follow.restaurant = '$escaped_restaurant'";
   }
   
   $statement = $db->prepare($query); 
   $statement->execute();

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();
}

function getUserEmail($username) {
   global $db;
   $query = "SELECT email FROM student WHERE username = '$username'";
   $statement = $db->prepare($query); 
   $statement->execute();

   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();

   return $results;
}

function getAllRestaurants()
{
   global $db;
   $query = "SELECT * FROM restaurant ";
   $statement = $db->prepare($query); 
   $statement->execute();

   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();

   return $results;
}

function getAllTypes(){
   global $db;
   $query = "SELECT DISTINCT restaurants_establishment FROM restaurant ";
   $typeArray = Array();
   $statement = $db->query($query);

   // fetchAll() returns an array for all of the rows in the result set
   // $results = $statement->fetchAll();
   while($result = $statement->fetch(PDO::FETCH_ASSOC)){
      $typeArray[] = $result['restaurants_establishment'];
   }

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();

   return $typeArray;
}

function addRestaurant($name, $phone)
{
   global $db;

   $query = "INSERT INTO restaurant (restaurants_name, restaurants_phone_numbers) VALUES ('testing', '111-111-1111')";
   $statement = $db->prepare($query);
   // $statement->bindValue(':name', $name);
   // $statement->bindValue(':phone', $phone);
   $statement->execute();     // if the statement is successfully executed, execute() returns true
                              // false otherwise 

   $statement->closeCursor();
}

function addReview($email, $review)
{
   global $db;

   $query = "INSERT INTO review (student_email, review_text) VALUES ('s2k@virginia.edu', 'nom yumz')";
   $statement = $db->prepare($query);
   // $statement->bindValue(':name', $name);
   // $statement->bindValue(':phone', $phone);
   $statement->execute();     // if the statement is successfully executed, execute() returns true
                              // false otherwise 

   $statement->closeCursor();
}

function getTopThree()
{
   global $db;
   $query = "SELECT * FROM restaurant ORDER BY `restaurant`.`restaurants_user_rating_aggregate_rating` DESC LIMIT 3";
   $statement = $db->prepare($query); 
   $statement->execute();

   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();

   return $results;
}

function getcsv()
{
   global $db;
   $query = "SELECT * FROM restaurant ";
   $statement = $db->prepare($query); 
   $statement->execute();

   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();

   return $results;
}
?>