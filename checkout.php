<?php

    session_start();
    require_once "classes/Cart.php";
    require_once "products_data.php";

    $cart  = new Cart();
    $items = $cart->get_items();
    if (empty($items)) {
        echo "<p>Your cart is empty. <a href='index.php'>Continue Shopping</a></p>";
        exit;

    }

    $total_price = 0;
    foreach ($items as $product_id => $quantity) {
        if (isset($products[$product_id])) {
            $product = $products[$product_id];
            $total_price += $product->get_price() * $quantity;
        }
    }
?>

<h2>Checkout</h2>

<h3>Total Amount: $<?php echo $total_price; ?></h3>
<form method="POST" action="place_order.php">
    <label for="paymentMethod">Select Payment Method:</label> <br>
    <input type="radio" id="cod" name="paymentMethod" value="COD" checked>Cash on Delivery <br>
    <input type="radio" id="online" name="paymentMethod" value="online">Credit Card <br>
    <!-- <select name="paymentMethod" id="paymentMethod" required>
        <option value="COD">Cash on Delivery</option>
        <option value="online">Credit Card</option>
        <option value="PayPal">PayPal</option>
    </select> -->
    <br><br>

    <strong>Total Price: $<?php echo $total_price; ?></strong>
    <br><br>
    <button type="submit">Place Order</button>
</form>