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
    
  ?>

</body>
</html>