<?php

use Illuminate\Database\Seeder;
use App\Orders;
use App\products;

class Order_ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $orders = Orders::get();



    	// for ($i=1; $i < count($orders) ; $i++) { 

    	// 	DB::table('order_product')->insert([
		   //      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
		   //      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
		   //      'order_id' => 1,
		   //      'product_id' => 2,
	    //     ]);
    	// 	# code...
    	// }
        DB::table('order_product')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 1,
	        'product_id' => 2,
	    ]);
	    DB::table('order_product')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 2,
	        'product_id' => 3,
	    ]);
	    DB::table('order_product')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 3,
	        'product_id' => 4,
	    ]);
	    DB::table('order_product')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 4,
	        'product_id' => 2,
	    ]);
	    DB::table('order_product')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 5,
	        'product_id' => 1,
	    ]);
	    DB::table('order_product')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 6,
	        'product_id' => 2,
	    ]);
	    DB::table('order_product')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 7,
	        'product_id' => 3,
	    ]);
	    DB::table('order_product')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 8,
	        'product_id' => 1,
	    ]);
    }
}
