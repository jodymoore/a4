<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Product;

class OrderProductTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        // get all the products
        $products = Product::all();

        // get all orders in database should be 10 
        $orders = Order::all();
       
        // number of products in each order 
        $numOfProducts = [2,4,6,3,1,4,3,3,1,2];

        // array for product ids 
       $prodId = [3,1,5,2,5,13,8,14,11,7];
        
        // instance Order Model
        $order = new Order();

        for ($i=0; $i < count($orders); $i++) { 

            $productsArry = [];

            // this loop is designed to loop over a number of products
            // and place them in a products array to be added to a users order.
            // loop over number of products 
            for ($j=0; $j < 1 ; $j++) { 
             	
                $productsArry[] = $products[$prodId[$i]-1]->id;

            }

            $order = $orders->where('id', '=', $i+1)->first();

            foreach ($productsArry as $productId) {
                $product = Product::where('id', '=', $productId)->first();
                $order->products()->save($product);
            }
  
        }
         
    }
}
