<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	public function run () {

		DB::table('users')->delete();

		$data = array(
			['name' => 'admin', 'email' => 'admin@promocloth.com', 'password' => '$2y$10$vGvkbvPVSDzvKo81FVwEQOrqlWvF4/7TGxX9qgXgz3GNwrxahErLK', 'status' => 'active', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['name' => 'itsrain', 'email' => 'me@itsrain.com', 'password' => Hash::make('itsrain'), 'status' => 'active', 'created_at' => new DateTime, 'updated_at' => new DateTime],
		);
		DB::table('users')->insert($data);
	}
}