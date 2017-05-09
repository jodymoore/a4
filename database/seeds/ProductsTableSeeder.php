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
        $pSizes = ["Small", "Medium", "Large"];
        $toppings = ["CHEESE","PEPPERONI", "SUPREME", "VEGETABLE", "CREATE YOUR OWN"];
        $priceArry = [5.99,6.99,7.99];

        for ($i=0; $i < count($toppings); $i++) { 
        	for ($j=0; $j < count($pSizes); $j++) { 

			    switch ( $toppings[$i]) {
			        case 'CHEESE':
				      Product::insert([
					        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'topping' => $toppings[$i],
					        'desc' => 'marinara topped with fresh mozzarella cheese and'.' '.$toppings[$i].'.',
					        'size' => $pSizes[$j],
					        'image_url' => 'https://s3.amazonaws.com/jwm-product-images/Cheese.png',
					        'price' => $priceArry[$j],
					  ]);
		               break;
			        case 'PEPPERONI':
			          	Product::insert([
					        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'topping' => $toppings[$i],
					        'desc' => 'marinara topped with fresh mozzarella cheese and'.' '.$toppings[$i].'.',
					        'size' => $pSizes[$j],
					        'image_url' => 'https://s3.amazonaws.com/jwm-product-images/Cheese.png',
					        'price' => $priceArry[$j] + 1.00,
				         ]);            
			           break;
			        case 'SUPREME':
			          	Product::insert([
					        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'topping' => $toppings[$i],
					        'desc' => 'marinara topped with fresh mozzarella cheese and'.' '.$toppings[$i].'.',
					        'size' => $pSizes[$j],
					        'image_url' => 'https://s3.amazonaws.com/jwm-product-images/Cheese.png',
					        'price' => $priceArry[$j] + 2.00,
				         ]);
			            break;
			        case 'VEGETABLE':
			             Product::insert([
					        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'topping' => $toppings[$i],
					        'desc' => 'marinara topped with fresh mozzarella cheese and'.' '.$toppings[$i].'.',
					        'size' => $pSizes[$j],
					        'image_url' => 'https://s3.amazonaws.com/jwm-product-images/Cheese.png',
					        'price' =>  $priceArry[$j] + 3.49,
				         ]);
			            break;
			        case 'CREATE YOUR OWN':
			             Product::insert([
					        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
					        'topping' => $toppings[$i],
					        'desc' => 'marinara topped with fresh mozzarella cheese and'.' '.$toppings[$i].'.',
					        'size' => $pSizes[$j],
					        'image_url' => 'https://s3.amazonaws.com/jwm-product-images/Cheese.png',
					        'price' =>  $priceArry[$j],
				         ]);
			            break;


			    }
        	}
        }

    }
}
