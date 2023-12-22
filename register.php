<?php 
  include("connection.php");
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="main.css" rel="stylesheet">
</head>
<body>
  <?php
    if (isset($_COOKIE['user'])) {
      $user = $_COOKIE['user'];
      echo ''.$user.'';
    };
    echo "<br>"
  ?>
  <p>Sign up</p>
    <form name="form" action="signup.php" onsubmit="return isvalid()" method="POST">
      <label>Username: </label>
      <input type="text" id="user" name="user"></br></br>
      <label>Password: </label>
      <input type="password" id="pass" name="pass"></br></br>
      <input type="submit" id="btn" value="Login" name = "submit"/>
    </form>
</body>
</html>