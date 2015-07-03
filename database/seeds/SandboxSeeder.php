<?php

use Illuminate\Database\Seeder;

class SandboxSeeder extends Seeder {

	public function run () {

		DB::table('oauth_clients')->delete();

		$data = array(
			['id' => '4c46bc790ffe655a1e65acfacf95da50cd4d3902', 'secret' => '3237728678b897c31b5082199e102fcd45f912be', 'name' => 'Main Apps', 'created_at' => new DateTime, 'updated_at' => new DateTime],
		);
		DB::table('oauth_clients')->insert($data);
	}
}