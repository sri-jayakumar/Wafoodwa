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


function getAllFriends()
{
   global $db;
   $query = "SELECT * FROM 'restaurant' ";
   $statement = $db->prepare($query); 
   $statement->execute();

   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();

   return $results;
}

?>