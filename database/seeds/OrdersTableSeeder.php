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

        $productsArry = [];

        $productPrice = [];

        $user = new User();

        for ($i=0; $i < $numberOfOrders; $i++) { 

             // get random user id
             $randUser = rand(1,5);

             // get random number of products to place in order
             $numOfProducts = rand(1,4);

             // use random user id to query DB
             $user = User::where('id','=',$randUser)->get();

             echo $user ;

             // loop over number of products 
             for ($j=0; $j < $numOfProducts ; $j++) { 
             	// get random product id 
             	$prodId = rand(1,count($products));
             	// place product id in products array
             	$productsArry[] = $products[$j]->id;
             	// place product price in price variable
             	$productPrice[] = $products[$j]->price;
             }
             // get total of product price array
             $total = array_sum($productPrice);

            // insert into orders table
            Order::insert([
		        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		        'user_id' => $randUser,
		        'name' => $user->name,
		        'email' => $user->email,
		        'total' => $total,
			]);
         }

         // save order model 
         // sync products to pivot


     //    Order::insert([
	    //     'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'user_id' => 1,
	    //     'name' => 'Jody Moore',
	    //     'email' => 'jodymoore@g.harvard.edu',
	    //     'total' => 9.99,
	    // ]);

     //    Order::insert([
	    //     'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'user_id' => 1,
	    //     'name' => 'Jody Moore',
	    //     'email' => 'jodymoore@g.harvard.edu',
	    //     'total' => 10.99,
	    // ]);

     //    Order::insert([
	    //     'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'user_id' => 1,
	    //     'name' => 'Jody Moore',
	    //     'email' => 'jodymoore@g.harvard.edu',
	    //     'total' => 11.99,
	    // ]);

     //    Order::insert([
	    //     'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'user_id' => 1,
	    //     'name' => 'Jody Moore',
	    //     'email' => 'jodymoore@g.harvard.edu',
	    //     'total' => 6.99,
	    // ]);

	    // Order::insert([
	    //     'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'user_id' => 2,
	    //     'name' => 'Rhiannon Moore',
	    //     'email' => 'rlov11@global.com',	        
	    //     'total' => 5.99,
	    // ]);

	    // Order::insert([
	    //     'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'user_id' => 2,
	    //     'name' => 'Rhiannon Moore',
	    //     'email' => 'rlov11@global.com',	        
	    //     'total' => 7.99,
	    // ]);

	    // Order::insert([
	    //     'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'name' => 'Rhiannon Moore',
	    //     'user_id' => 2,
	    //     'email' => 'rlov11@global.com',	        
	    //     'total' => 10.99,
	    // ]);

	    // Order::insert([
	    //     'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    //     'user_id' => 2,
	    //     'name' => 'Rhiannon Moore',
	    //     'email' => 'rlov11@global.com',	        
	    //     'total' => 6.99,
	    // ]);

    }
}
