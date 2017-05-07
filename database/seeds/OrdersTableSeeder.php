<?php

use Illuminate\Database\Seeder;
use App\Orders;

class OrdersTableSeeder extends Seeder
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
	        'user_id' => 1,
	        'name' => 'Jody Moore',
	        'email' => 'jodymoore@g.harvard.edu',
	        'order' =>'1 Large pepperoni pizza',
	        'total' => 9.99,
	    ]);

        Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 1,
	        'name' => 'Jody Moore',
	        'email' => 'jodymoore@g.harvard.edu',
	        'order' =>'1 Large supreme pizza',
	        'total' => 10.99,
	    ]);

        Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 1,
	        'name' => 'Jody Moore',
	        'email' => 'jodymoore@g.harvard.edu',
	        'order' =>'1 Large vegetable pizza',
	        'total' => 11.99,
	    ]);

        Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 1,
	        'name' => 'Jody Moore',
	        'email' => 'jodymoore@g.harvard.edu',
	        'order' =>'1 medium cheese pizza',
	        'total' => 6.99,
	    ]);

	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 2,
	        'name' => 'Rhiannon Moore',
	        'email' => 'rlov11@global.com',	        
	        'order' =>'1 small pepperoni pizza',
	        'total' => 5.99,
	    ]);

	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 2,
	        'name' => 'Rhiannon Moore',
	        'email' => 'rlov11@global.com',	        
	        'order' =>'1 Large cheese pizza',
	        'total' => 7.99,
	    ]);

	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Rhiannon Moore',
	        'user_id' => 2,
	        'email' => 'rlov11@global.com',	        
	        'order' =>'1 Large supreme pizza',
	        'total' => 10.99,
	    ]);

	    Orders::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 2,
	        'name' => 'Rhiannon Moore',
	        'email' => 'rlov11@global.com',	        
	        'order' =>'1 medium cheese pizza',
	        'total' => 6.99,
	    ]);

    }
}
