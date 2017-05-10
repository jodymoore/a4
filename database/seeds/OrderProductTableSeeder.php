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

        $orders = Order::all();

        

        $numOfProducts = [2,4,6,3,1,4,3,3,1,2];

        $useridArry = [3,5,1,2,2,5,3,1,3,4];

        $prodId = [3,1,14,2,5,6,8,10,11,15];

        $order = new Order();

        for ($i=0; $i < count($orders); $i++) { 

            $productsArry = [];

             // this loop is designed to loop over a number of products
             // and place them in a products array to be added to a users order.
             // loop over number of products 
             for ($j=0; $j < $numOfProducts[$i] ; $j++) { 
             	
               $productsArry[] = $products[$prodId[$i]-1]->id;
                
             }

    

              $order->find($i+1);
        
              $order->products()->sync($productsArry);
    
            // $order->save();
         }

    }
}
