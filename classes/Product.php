<?php

class Product
{

    public $id;
    public $title;
    public $price;
    public $image;

    public function __construct($id, $title, $price, $image)
    {
        $this->id    = $id;
        $this->title = $title;
        $this->price = $price;
        $this->image = $image;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_title()
    {
        return $this->title;
    }

    public function get_price()
    {
        return $this->price;
    }

    public function get_image()
    {
        return $this - image;
    }

}
