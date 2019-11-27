<?php
require('connect_db_pdo.php');      // include code to connect to a database      
require('res_db.php');   
session_start();

$errors = array(); 

// connect to the database

// REGISTER USER
if (isset($_POST['reg_user'])) {
  global $db;
  echo "register button clicked";
  // receive all input values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
  echo "received all values submitted";

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	 array_push($errors, "The two passwords do not match");
  }
  echo "make sure form is correctly filled";

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM student WHERE email='$email' OR username= '$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $student = mysqli_fetch_assoc($result);

  if ($student) { // if user exists
    echo "student exists";
    if ($student['username'] === $username) {
      array_push($errors, "Username already exists");
    }
    if ($student['email'] === $email) {
      array_push($errors, "email already exists");
    }
  } 

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO student(email, username, password, year, name, food_preference) VALUES('$email', '$username', '$password', '2020', 'Martha', 'Chinese')";


    $statement = $db->prepare($query); 
    $statement->execute();

    $statement->closeCursor();
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header("Location: ./profile.php?signup=success");
    // so page successfully redirects here, but user is not saved to database
  }
}

// // LOGIN USER
// if (isset($_POST['login_user'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];

//   if (empty($username)) {
//     array_push($errors, "Username is required");
//   }
//   if (empty($password)) {
//     array_push($errors, "Password is required");
//   }

//   if (count($errors) == 0) {
//     $password = md5($password);
//     $query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
//     echo mysql_error();
//     $results = mysqli_query($db, $query);

//     if (mysqli_num_rows($results) == 1) {
//       echo "success";
//       $_SESSION['username'] = $username;
//       $_SESSION['success'] = "You are now logged in";
//       header("Location: ./index.php?signup=success");
//     }else {
//       echo "error alert";
//       array_push($errors, "Wrong username/password combination");
//     }
//   }
// }

?>
