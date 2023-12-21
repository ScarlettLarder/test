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

  <h1 class="red">
    Hello world!
  </h1>
  <?php
    if (isset($_COOKIE['user'])) {
      $user = $_COOKIE['user'];
      echo ''.$user.'';
    };
  ?>
  <div id="form">
    <h1>Login Form</h1>
    <form name="form" action="login.php" onsubmit="return isvalid()" method="POST">
      <label>Username: </label>
      <input type="text" id="user" name="user"></br></br>
      <label>Password: </label>
      <input type="password" id="pass" name="pass"></br></br>
      <input type="submit" id="btn" value="Login" name = "submit"/>
    </form>
    <a href="register.php">Register</a>
  </div>
<script>
  function isvalid() {
    var user = document.form.user.value;
    var pass = document.form.pass.value
    if(user.length=="" || pass.length==""){
      alert("Username or password is empty.")
      return false
    }
  }
</script>
<div>
<?php
    $sql = "select * from product"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "Order ID: " . $row["name"] ."<br>";
          echo '<img src = "data:image/png;base64,' . base64_encode($row['img_url']) . '" width = "500px" height = "500px"/>';
      }
    } 
?>
</div>
</body>
</html>