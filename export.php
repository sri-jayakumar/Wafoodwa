<?PHP
  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.
  require('connect_db_pdo.php'); 
  require('res_db.php');    

  // filename for download
  $filename = "wafoodwa" . ".csv";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: text/csv");

  $out = fopen("php://output", 'w');

  $flag = false;
  $restaurants = getcsv();
  
  foreach($restaurants as $row){
    if(!$flag) {
      // display field/column names as first row
      fputcsv($out, array_keys($row), ',', '"');
      $flag = true;
    }
    fputcsv($out, array_values($row), ',', '"');
  }
  fclose($out);
  exit;
?>