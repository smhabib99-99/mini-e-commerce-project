<?php

class Cart
{

    public function __construct()
    {
        if (! isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function add_item($product_id)
    {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += 1;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }
    }

    public function remove_item($product_id)
    {
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
    }

    public function get_items()
    {
        return $_SESSION['cart'];
    }

    public function clear()
    {
        unset($_SESSION['cart']);
    }

    // public $items;

    // public function __construct()
    // {
    //     $this->items = [];
    // }

    // public function add_item($product)
    // {
    //     $this->items[] = $product;
    // }

    // public function get_items()
    // {
    //     return $this->items;
    // }

}
