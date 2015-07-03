<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {

	public function run () {

		DB::table('categories')->delete();

		$data = array(
			['1', 'name' => 'Jacket', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['2', 'name' => 'Hoodie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['3', 'name' => 'Kaos', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['4', 'name' => 'Kemeja', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['5', 'name' => 'Short Pants', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['6', 'name' => 'Long Pants', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['7', 'name' => 'Topi', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['8', 'name' => 'Tas', 'created_at' => new DateTime, 'updated_at' => new DateTime],
		);
		DB::table('categories')->insert($data);
	}
}