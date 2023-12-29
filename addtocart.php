
<?php
    include("connection.php");
    session_start();

    $productId = isset($_GET['id']) ? $_GET['id'] : 0;
    $sql = "select * from product where product_id = '$productId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $cartItem = [
            'id'    => $product['product_id'],
            'name'  => $product['name'],
            'price' => $product['price'],
            'qty'   => 1
        ];

        // If the product is already in the cart, update the quantity
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['qty']++;
        } else {
            $_SESSION['cart'][$productId] = $cartItem;
        }

        echo "Product '{$product['name']}' added to the cart.";
    }

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            echo "{$item['name']} - Quantity: {$item['qty']} - Price: \${$item['price']}<br>";
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }
?>
<a href='checkout.php'>Checkout</a>