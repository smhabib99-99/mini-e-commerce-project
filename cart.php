<?php

    session_start();
    require_once "classes/Cart.php";
    require_once "products_data.php";
    $cart  = new Cart();
    $items = $cart->get_items();
?>


<h2>
    My Shopping Cart
</h2>
<h3>
    <a href="index.php">Continue Shopping</a>
</h3>


<?php
    if (empty($items)):
?>
    <p>Your cart is empty.</p>
<?php
else: ?>
    <ul>
        <?php
            $total = 0;
            foreach ($items as $product_id => $quantity):
                if (! isset($products[$product_id])) {
                    continue;
                }

                $product  = $products[$product_id];
                $subtotal = $product->get_price() * $quantity;
                $total += $subtotal;
            ?>
			                <li>
			                    <?php echo $product->get_title(); ?> -
			                    Quantity:<?php echo $quantity; ?> -
			                    Subtotal: $<?php echo $subtotal; ?> =
		                        <a href="remove_from_cart.php?product_id=<?php echo $product_id; ?>">Remove</a>
			                </li>
			                <?php
                                endforeach;
                            ?>
    </ul>

<?php
    endif;
?>
