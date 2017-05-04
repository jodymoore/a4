<?php

use Illuminate\Database\Seeder;
use App\Products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'topping' => 'CHEESE',
	        'desc' => 'marinara topped with fresh mozzarella cheese.',
	        'image_url' => 'https://s3.amazonaws.com/jwm-product-images/Cheese.png',
	        'price' => 5.99,
	    ]);

	    Products::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'topping' => 'PEPPERONI',
	        'desc' => 'marinara topped with fresh mozzarella cheese and pepperoni.',
	        'image_url' => 'https://s3.amazonaws.com/jwm-product-images/pepperoni.png',
	        'price' => 6.99,
	    ]);

	    Products::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'topping' => 'SUPREME',
	        'desc' => 'pepperoni,pork, beef, mushrooms, green peppers and onions.',
	        'image_url' => 'https://s3.amazonaws.com/jwm-product-images/Supreme.png',
	        'price' => 8.99,
	    ]);

	    Products::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'topping' => 'VEGETABLE',
	        'desc' => 'marinara topped with fresh mozzarella cheese,green peppers, 
	                   mushrooms, and black olives.',
	        'image_url' => 'https://s3.amazonaws.com/jwm-product-images/Cheese.png',
	        'price' => 9.49,
	    ]);

    }
}
