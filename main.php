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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />  
  <title>PHP and database</title>    
  <style>
    label { width: 120px; }
    textarea { border:1px solid #ddd; }
  </style>
</head>
<body>
  
  <div class="container">
    <h1>Restaurants</h1>
    <table class="table table-striped table-bordered">
      <?php foreach ($restaurants as $restaurant): ?>
      <tr>
        <td>
          <?php echo $restaurant['restaurants_name']; ?> 
        </td>
        <td>
          <?php echo $restaurant['restaurants_location_address']; ?> 
        </td>        
        <td>
          <?php echo $restaurant['restaurants_phone_numbers']; ?> 
        </td>        
        <td>
          <?php echo $restaurant['restaurants_url']; ?> 
        </td>        
      </tr>
      <?php endforeach; ?>
    </table>


<?php     
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
   $restaurants = getAllRestaurants();
   include('restaurants.php');        // default action
   echo "<br/><hr/>";
}
?>   
  </div>
 
</body>
</html>