<?php
    include('connection.php');
    session_start();
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            echo "{$item['name']} - Quantity: {$item['qty']} - Price: \${$item['price']}<br>";
        }
    
    } else {
        echo "<p>Your cart is empty.</p>";
    }
?>