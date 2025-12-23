<?php
class Order
{
    public $order_id;
    public $items;
    public $total_price;
    public $order_date;
    public $paymentMethod;

    public function __construct($order_id, $items, $total_price, $order_date, $paymentMethod)
    {
        $this->order_id      = $order_id;
        $this->items         = $items;
        $this->total_price   = $total_price;
        $this->order_date    = $order_date;
        $this->paymentMethod = $paymentMethod;
        $this->status        = ($paymentMethod === 'COD') ? 'Pending' : 'Paid';
    }

    public function get_order_id()
    {
        return $this->order_id;
    }

    public function get_items()
    {
        return $this->items;
    }

    public function get_total_price()
    {
        return $this->total_price;
    }

    public function get_order_date()
    {
        return $this->order_date;
    }
}
