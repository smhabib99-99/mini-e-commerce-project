<?php
    session_start();
    require_once "classes/Cart.php";
    require_once "products_data.php";

    if (! isset($_POST['paymentMethod'])) {
        echo "<p>No payment method selected. <a href='checkout.php'>Go back to Checkout</a></p>";
        exit;
    }

    $paymentMethod = $_POST['paymentMethod'];
    $cart          = new Cart();
    $items         = $cart->get_items();
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

    $order_id   = uniqid('order_');
    $order_date = date('Y-m-d H:i:s');
    require_once "classes/Order.php";
    $order = new Order($order_id, $items, $total_price, $order_date, $paymentMethod);
    // Here you would typically save the order to a database
    // For this example, we'll just display the order details

    // Store order in session for demonstration purposes

    $_SESSION['last_order'] = $order;
?>



?><h2>Order Confirmation</h2>
<p>Thank you for your order!</p>
<p>Order ID:                                     <?php echo $order->get_order_id(); ?></p>
<p>Order Date:<?php echo $order->get_order_date(); ?></p>
<p>Total Price: $<?php echo $order->get_total_price(); ?></p>
<p>Payment Method:<?php echo htmlspecialchars($paymentMethod); ?></p>
<h3>Items Ordered:</h3>
<ul>
    <?php
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
    // Clear the cart after placing the order
    $cart->clear();
?>
<p><a href="index.php">Continue Shopping</a></p>

<?php
    // Redirect to a success page after order placement
    //     header('Location: order_success.php?order_id=' . $order_id);
    // exit;

header('Location: order_success.php');
exit;