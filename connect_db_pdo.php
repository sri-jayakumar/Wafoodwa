<?php
//   Note: Looking in the wrong database and/or wrong table may results in either
//         cannot connect to the database, not find table, or no result set.
//         Thus, specify the correct database name

// hostname
$hostname = 'cs4750.cs.virginia.edu';
// $hostname = 'localhost:3306';                 // local DB server (XAMPP on your computer)

// database name
$dbname = 'asv6ef';                    // cs server 

// database credentials 
$username = 'asv6ef';                  // cs server
$password = 'jieY0oof';       // cs server


// DSN (Data Source Name) specifies the host computer for the MySQL datbase 
// and the name of the database. 

$dsn = "mysql:host=$hostname;dbname=$dbname";

// To connect to a MySQL database named web4640,  
// need three arguments: DSN, username, and password

// PDO (PHP Data Objects) defines an inerface for accessing database. 
// It is a database abstraction layer, providing flexibility for many database engines. 
// If you have to switch your project to use another database, PDO makes the process easy. 
// You only have to change the connection string and a few queries.
// No need to rewrite the entire code / queries

// To connect to a database, create an instance of PDO
// Syntax: 
//     new PDO(dsn, username, password);


/** connect to the database **/
try 
{
   $db = new PDO($dsn, $username, $password);
   
   // dispaly a message to let us know that we are connected to the database 
   // echo "<p>You are connected to the database</p>";
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{
   // To call a method from any object, use the object's name followed by -> and then method's name
   
   // All exception objects provide a getMessage() method that returns the error message 
   $error_message = $e->getMessage();        
   echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e)        // handle any type of exception
{
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}

?>

<?php 
// To close a connection, uncomment the following line
// $db = null;
?>
