<?php

session_start();
require_once "classes/Cart.php";
// $cart = new Cart();
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $cart       = new Cart();
    $cart->add_item($product_id);
}

header("Location: index.php");
exit();
