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
        Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 1,
	        'product_id' => 2,
	    ]);
	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 2,
	        'product_id' => 3,
	    ]);
	   Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 3,
	        'product_id' => 4,
	    ]);
	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 4,
	        'product_id' => 2,
	    ]);
	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 5,
	        'product_id' => 1,
	    ]);
	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 6,
	        'product_id' => 2,
	    ]);
	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 7,
	        'product_id' => 3,
	    ]);
	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 8,
	        'product_id' => 1,
	    ]);
    }
}
