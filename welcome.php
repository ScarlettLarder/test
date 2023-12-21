<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="main.css" rel="stylesheet">
</head>
<body>
      <?php
        include('connection.php');
        
        $userid = $_COOKIE["user"];
        echo''.$userid.'';
        $sql = "SELECT * FROM orders
                JOIN user ON orders.id = user.id
                WHERE user.name = '$userid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "Order ID: " . $row["id"] . " Order Contents: " . $row["Order_contents"] . "<br>";
          }
        } 
        else {
            echo "No orders found for the user.";
        }
        $conn->close();
      ?>
</body>
</html>