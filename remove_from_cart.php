<?php

session_start();
require_once "classes/Cart.php";
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $cart       = new Cart();
    $cart->remove_item($product_id);
}

header("Location: cart.php");
exit();
