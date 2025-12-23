<?php

    session_start();
    require_once "classes/Order.php";
    require_once "products_data.php";
    require_once "place_order.php";

    $order = new Order();

    if (! isset($_SESSION['last_order'])) {
        echo "<p>No order ID provided. <a href='index.php'>Go back to Home</a></p>";
        exit;
    }
    $order = $_SESSION['last_order'];
    // In a real application, you would fetch order details from the database using the order ID
    // For this example, we'll just display a success message

?>


<h2>Order Confirmation</h2>
<p>Thank you for your order!</p>
<p>Order ID:<?php echo $order->get_order_id(); ?></p>
<p>Order Date:<?php echo $order->get_order_date(); ?></p>
<p>Total Price: $<?php echo $order->get_total_price(); ?></p>
<p>Payment Method:<?php echo htmlspecialchars($order->paymentMethod); ?></p>
<h3>Items Ordered:</h3>
<ul>
    <?php
        require_once "products_data.php";
        foreach ($order->get_items() as $product_id => $quantity) {
            if (isset($products[$product_id])) {
                $product = $products[$product_id];
            ?>
            <li>
                <?php echo $product->get_title(); ?> - Quantity:<?php echo $quantity; ?>
            </li>
            <?php
                }
                }
            ?>
</ul>

<?php
    // Clear the last order from session
    unset($_SESSION['last_order']);
?>
