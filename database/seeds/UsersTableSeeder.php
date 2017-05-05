<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
	        'name' => 'Jody Moore',
	        'email' => 'jodymoore@g.harvard.edu',
	        'password' => crypt('root','rl'),
	        'phoneNumber' => '555-555-5555',
	        'zipcode' => '72213',

	    ]);

	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Rhiannon Moore',
	        'email' => 'rlov11@global.com',
	        'password' => crypt('root','rl'),
	        'phoneNumber' => '555-555-5555',
	        'zipcode' => '72213',

	    ]);

	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Sam Watterston',
	        'email' => 'samual@thisisIt.com',
	        'password' => crypt('root','rl'),
	        'phoneNumber' => '555-555-5555',
	        'zipcode' => '72213',

	    ]);

	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Sheila wWlson',
	        'email' => 'sheila@g.harvard.edu',
	        'password' => crypt('root','rl'),
	        'phoneNumber' => '555-555-5555',
	        'zipcode' => '72213',

	    ]);
    }
}
