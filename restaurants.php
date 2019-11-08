<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
  <title>PHP and database</title>    
</head>
<body>
  <div class="container">
  <br/>
    <table class="table table-striped table-bordered">
      <tr>
        <th>Restaurant Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Website</th>
      </tr>      
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
    
  </div>
  
  
</body>
</html>