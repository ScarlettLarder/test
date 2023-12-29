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
  <a href="page.php">Got back home</a>
  <h1 class="red">
    Order page
  </h1>
  <?php
    if (isset($_COOKIE['user'])) {
      $user = $_COOKIE['user'];
      echo ''.$user.'';
    };
  ?>
  <div id="form">
    <h1>Where would you like to pick up from?</h1>
    <form name="form" action="ordersub.php" onsubmit="return isvalid()" method="POST">
      <label>Location: </label>
      <select id="location" name="cars">
        <option value="Big store">Big store</option>
        <option value="Wessex">Wessex</option>
        <option value="Small store">Small store</option>
      </select>
      <label for="birthdaytime">Birthday (date and time):</label>
      <input type="datetime-local" id="birthdaytime" name="birthdaytime">
      <input type="submit" id="btn" value="Submit" name = "submit"/>
    </form>
    <a href="register.php">Register</a>
    <a href="signout.php">Sign out</a>
  </div>

<div>
<?php
    session_start();
    $sql = "select * from product"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<br>Order ID: " . $row["name"] ."<br>";
          echo '<br><img src = "data:image/png;base64,' . base64_encode($row['img_url']) . '" width = "500px" height = "500px"/><br>';
          echo "<li>{$row['name']} - \${$row['price']} <a href='addToCart.php?id={$row['product_id']}'>Add to Cart</a></li>";
      }
    }
?>
</div>


</body>
</html>