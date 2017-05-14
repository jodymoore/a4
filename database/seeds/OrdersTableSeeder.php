<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Product;
use App\User;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $numberOfOrders = 10;

        $products = Product::all();

        $numOfProducts = [2,4,6,3,1,4,3,3,1,2];

        $useridArry = [3,5,1,2,2,5,3,1,3,4];

        $prodId = [3,1,5,2,5,13,8,14,11,7];

        for ($i=0; $i < $numberOfOrders; $i++) { 
        	 $productsArry = [];

             $productPrice = [];

             // use user id to query DB
             $user = User::where('id','=',$useridArry[$i])->first();
             // this loop is designed to loop over a number of products
             // and place them in a products array to be added to a users order.
             // loop over number of products 
             for ($j=0; $j < 1 ; $j++) { 

             	// place product id in products array
             	$productsArry[] = $products[$prodId[$i]-1]->id;   

             	// place product price in price variable
             	$productPrice[] = $products[$prodId[$i]-1]->price;
             }
             // get total of product price array
             $total = array_sum($productPrice);

            // insert into orders table
            Order::insert([
		        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		        'user_id' => $useridArry[$i],
		        'name' => $user->name,
		        'email' => $user->email,
		        'total' => $total,
			]);

         }

    }
}