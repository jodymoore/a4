<?php

use Illuminate\Database\Seeder;
use App\Customers;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customers::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Jody Moore',
	        'Email' => 'jodymoore@g.harvard.edu',
	        'phoneNumber' => '555-555-555',
	        'zipcode' => '722132',

	    ]);

	    Customers::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Rhiannon Moore',
	        'Email' => 'rlov11@global.com',
	        'phoneNumber' => '555-555-555',
	        'zipcode' => '722132',

	    ]);

	    Customers::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Sam Watterston',
	        'Email' => 'samual@thisisIt.com',
	        'phoneNumber' => '555-555-555',
	        'zipcode' => '722132',
	    ]);

	    Customers::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Sheila Wilson',
	        'Email' => 'sheila@g.harvard.edu',
	        'phoneNumber' => '555-555-555',
	        'zipcode' => '722132',

	    ]);
    }
}
