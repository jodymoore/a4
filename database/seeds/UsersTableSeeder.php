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
	        'Email' => 'jodymoore@g.harvard.edu',
	        'password' => crypt('root','rl'),

	    ]);

	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Rhiannon Moore',
	        'Email' => 'rlov11@global.com',
	        'password' => crypt('root','rl'),

	    ]);

	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Sam Watterston',
	        'Email' => 'samual@thisisIt.com',
	        'password' => crypt('root','rl'),

	    ]);

	    User::insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'name' => 'Sheila wWlson',
	        'Email' => 'sheila@g.harvard.edu',
	        'password' => crypt('root','rl'),

	    ]);
    }
}
