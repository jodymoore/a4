<?php

namespace App\CustomClasses\CustomDirectory;



  class ProductClass {

		public $productId = 0;
		public $topping = "";
		public $productDesc = "constant string";
		public $productPrice = 0;

      
	public function __construct($productid) {
			$productId = $productid;
		    $topping = "";
			$productDesc = "no descrition";
			$productPrice  = 0;
		}

   }
?>