<?php

use Illuminate\Database\Seeder;
use App\Orders;
use App\products;

class Orders_ProductsTableSeeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $orders = Orders::get();
    	// for ($orders as $order) { 
    	// 	DB::table('order_product')->insert([
		   //      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		   //      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		   //      'order_id' => 1,
		   //      'product_id' => 2,
	    //     ]);
    	// 	# code...
    	// }
    	
        DB::table('orders_products')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'orders_id' => 1,
	        'products_id' => 2,
	    ]);
	    DB::table('orders_products')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'orders_id' => 2,
	        'products_id' => 3,
	    ]);
	    DB::table('orders_products')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'orders_id' => 3,
	        'products_id' => 4,
	    ]);
	    DB::table('orders_products')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'orders_id' => 4,
	        'products_id' => 2,
	    ]);
	    DB::table('orders_products')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'orders_id' => 5,
	        'products_id' => 1,
	    ]);
	    DB::table('orders_products')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'orders_id' => 6,
	        'products_id' => 2,
	    ]);
	    DB::table('orders_products')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'orders_id' => 7,
	        'products_id' => 3,
	    ]);
	    DB::table('orders_products')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'orders_id' => 8,
	        'products_id' => 1,
	    ]);
    }
}