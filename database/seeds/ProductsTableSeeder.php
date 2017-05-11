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
    	// Seed pizzas
        $pSizes = ['Small', 'Medium', 'Large'];
        $toppings = ['CHEESE','PEPPERON', 'SUPREME', 'VEGETABLE', 'CREATE YOUR OWN'];
        $desc = 'marinara topped with fresh mozzarella cheese and';
        $priceArry = [5.99,6.99,7.99];
        $bucket = 'https://s3.amazonaws.com/jwm-product-images/';
        
        $drinks = ['COKE','PEPSI', 'DR PEPPER', 'DIET COKE'];
        $dSize = '2 liter';

        // Seed Pizzas
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

        // Seed Drinks
        for ($k= 0; $k < count($drinks); $k++) { 
			Product::insert([
			  'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			  'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			  'topping' => $drinks[$k],
			  'desc' => '2 liter'.' '.$drinks[$k].'.',
			  'size' =>  '2 liter',
			  'image_url' =>  '/images/'.strtolower($drinks[$k]).'.png',
			  'price' => '2.99',
			]);
        }
    }
}
