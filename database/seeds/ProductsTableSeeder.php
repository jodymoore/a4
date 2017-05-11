<?php

use Illuminate\Database\Seeder;
use App\Product;


class ProductsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $pSizes = ['Small', 'Medium', 'Large'];
        $toppings = ['CHEESE','PEPPERONI', 'SUPREME', 'VEGETABLE', 'CREATE YOUR OWN'];
        $desc = 'marinara topped with fresh mozzarella cheese and';
        $priceArry = [5.99,6.99,7.99];
        $bucket = 'https://s3.amazonaws.com/jwm-product-images/';
        
        for ($i=0; $i < count($toppings); $i++) { 
        	for ($j=0; $j < count($pSizes); $j++) { 
				Product::insert([
				  'created_at' => Carbon\Carbon::now()->toDateTimeString(),
				  'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
				  'topping' => $toppings[$i],
				  'desc' => $desc.' '.$toppings[$i].'.',
				  'size' =>  $pSizes[$j],
				  'image_url' =>  $bucket.strtolower($toppings[$i]).'.png',
				  'price' => $priceArry[$j],
				]);
        	}
        }
    }
}
