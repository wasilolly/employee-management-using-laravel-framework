<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
			'email' => 'admin@gmail.com',
			'password' => bcrypt('admin'),
			'admin' => 1,
			'super_admin' => 1,
			'active' => 1
		]);
		
		App\User::create([
			'email' => 'notadmin@gmail.com',
			'password' => bcrypt('password'),
			'admin' => 1,
			'active' => 1
		]);
    }
}
