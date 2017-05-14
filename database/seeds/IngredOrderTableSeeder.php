<?php

use Illuminate\Database\Seeder;
use App\Ingred;
use App\Order;

class IngredOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// order id's that are seeded in order table with create your own id's
    	$orderids = [6,8];
 
        // get all the ingreds
        $ingreds = Ingred::all();

        for ($i=0; $i < 2; $i++) { 
        	        
            $orders = Order::where('id','=',$orderids[$i])->first();
            $ingred = Ingred::where('id', '=', $ingreds[$i]->id)->first();
            $orders->ing()->save($ingred);           
        }         
    }
}
