<?php
require('connect_db_pdo.php');      // include code to connect to a database      
require('res_db.php');           // include code to access and process a friend table 
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    * {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 100%;
  background: #F8F8FF;
  font-family: 'Avenir Next Condensed', sans-serif;
}
 
.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #000000;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #fda2b8;
  font-family: 'Avenir Next Condensed', sans-serif;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
</style>

<title>Registration system PHP and MySQL</title>
</head>
<body>
  <div class="header">
    <h2><font size="20">REGISTER</font></h2>
  </div>
  
  <form method="post" action="register_db.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    &nbsp;
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">R E G I S T E R</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
</body>
</html>