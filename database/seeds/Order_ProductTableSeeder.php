<?php

use Illuminate\Database\Seeder;

class Order_ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 1,
	        'product_id' => 2,
	    ]);
	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 2,
	        'product_id' => 3,
	    ]);
	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 3,
	        'product_id' => 4,
	    ]);
	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 4,
	        'product_id' => 2,
	    ]);
	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 5,
	        'product_id' => 2,
	    ]);
	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 5,
	        'product_id' => 2,
	    ]);
	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 7,
	        'product_id' => 2,
	    ]);
	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'order_id' => 8,
	        'product_id' => 2,
	    ]);
    }
}
