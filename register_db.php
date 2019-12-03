<?php
require('connect_db_pdo.php');      // include code to connect to a database      
require('res_db.php');   
session_start();

//Make an errors variable to keep track of error for THIS attempt
$errors = array();
// connect to the database

// REGISTER USER
if (isset($_POST['reg_user'])) {
  global $db;

  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	 array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM student WHERE email='$email' OR username= '$username' LIMIT 1";
  $statement = $db->prepare($user_check_query); 
  $statement->execute();

  $student = $statement->fetchAll();
 
  foreach ($student as $person){
    if ($person['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($person['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  //Save the errors to a session variable to access in another page
  $_SESSION['errors'] = $errors;

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO student(email, username, password) VALUES('$email', '$username', '$password')";
    $statement = $db->prepare($query); 
    $statement->execute();

    $statement->closeCursor();
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    $_SESSION['email'] = $email;
    header("Location: ./profile.php?signup=success");
    // so page successfully redirects here, but user is not saved to database
  } else {
    header("Location: ./signup.php");
  }
}

// // LOGIN USER
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  //form validation: check if username and password has been filled
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  $_SESSION['errors'] = $errors;

  //Now sign into main page if user exists
  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
    $statement = $db->prepare($query); 
    $statement->execute();

    $results = $statement->fetchAll();
    if (count($results) == 1) {
      echo "success";
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      foreach (getUserEmail($username) as $user){
        $_SESSION['email'] = $user['email'];
      } 
      header("Location: ./index.php?signup=success");
    }else {
      array_push($errors, "Wrong username/password combination");
      $_SESSION['errors'] = $errors; 
      header("Location: ./login.php");      
    }
  } else {
    header("Location: ./login.php");
  }
}

?>
