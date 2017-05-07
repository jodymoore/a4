<?php

namespace App;


class CustomerOrder 
{
     $order = null;
     $price = null;
     $order_id = null;

     CustomerOrder($order, $price, $order_id) {

     	$this->$order = $order;
     	$this->$price = $price;
     	$this->$order_id = $order_id;

     }
}