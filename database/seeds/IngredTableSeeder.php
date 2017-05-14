<?php

use Illuminate\Database\Seeder;
use App\Ingred;

class IngredTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $desc = ['Small pizza, reg cheese, pepperoni, ham, mushrooms, bell peppers pizza',
                  'Medium pizza, reg cheese, pepperoni, mushrooms, pizza'];
        $size = ['Small','Medium'];

        $price = [7.24,7.74];        

        for ($i=0; $i < 2; $i++) { 
			Ingred::insert([
			  'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			  'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			  'topping' => 'CREATE YOUR OWN',
			  'desc' => $desc[$i],
			  'size' =>  $size[$i],
			  'price' => $price[$i],
			]);
        }
    }
}

