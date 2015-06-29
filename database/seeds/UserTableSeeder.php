<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	public function run () {

		DB::table('users')->delete();

		$data = array(
			['id' => 1, 'name' => 'admin', 'email' => 'admin@promocloth.com', 'password' => '$2y$10$vGvkbvPVSDzvKo81FVwEQOrqlWvF4/7TGxX9qgXgz3GNwrxahErLK', 'created_at' => new DateTime, 'updated_at' => new DateTime],
		);
		DB::table('users')->insert($data);
	}
}