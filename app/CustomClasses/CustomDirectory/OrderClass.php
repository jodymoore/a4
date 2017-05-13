<?php

namespace App\CustomClasses\CustomDirectory;



  class OrderClass {

		public $orderId = 0;
		public $products = [];
		public $orderPrice = 0;

      
	public function __construct($orderid) {
			$orderId = $orderid;
			$products = [];
			$orderPrice = 0;
		}

   }
?>