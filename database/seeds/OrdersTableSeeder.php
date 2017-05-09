<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 1,
	        'name' => 'Jody Moore',
	        'email' => 'jodymoore@g.harvard.edu',
	        'total' => 9.99,
	    ]);

        Order::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 1,
	        'name' => 'Jody Moore',
	        'email' => 'jodymoore@g.harvard.edu',
	        'total' => 10.99,
	    ]);

        Order::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 1,
	        'name' => 'Jody Moore',
	        'email' => 'jodymoore@g.harvard.edu',
	        'total' => 11.99,
	    ]);

        Order::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 1,
	        'name' => 'Jody Moore',
	        'email' => 'jodymoore@g.harvard.edu',
	        'total' => 6.99,
	    ]);

	    Order::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 2,
	        'name' => 'Rhiannon Moore',
	        'email' => 'rlov11@global.com',	        
	        'total' => 5.99,
	    ]);

	    Order::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 2,
	        'name' => 'Rhiannon Moore',
	        'email' => 'rlov11@global.com',	        
	        'total' => 7.99,
	    ]);

	    Order::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Rhiannon Moore',
	        'user_id' => 2,
	        'email' => 'rlov11@global.com',	        
	        'total' => 10.99,
	    ]);

	    Order::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'user_id' => 2,
	        'name' => 'Rhiannon Moore',
	        'email' => 'rlov11@global.com',	        
	        'total' => 6.99,
	    ]);

    }
}
