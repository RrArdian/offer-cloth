<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Http\Models\Customer;

class CustomerTableSeeder extends Seeder {
	
	public function run () {

		$user = new User;
		$user->email = 'amirulbaharazis@gmail.com';
		$user->password = Hash::make('amirulbaharazis');
		$user->status = 'active';
		$user->save();

		$user_id = User::max('id');

		$role = User::find($user_id);
        $role->assignRole(2);

        $customer = new Customer;
        $customer->user_id = $user_id;
        $customer->fullname = 'Azis Amirulbahar';
        $customer->address = 'Jalan raya Yogya Purworejo km 9, Temon, Kulon Progo, Yogyakarta';
        $customer->avatar = 'assets/sandbox/default_avatar.png';
        $customer->sex = 'Laki-laki';
        $customer->phone = '081802726781';
        $customer->save();

        $user = new User;
		$user->email = 'mrizqihanafi@gmail.com';
		$user->password = Hash::make('mrizqihanafi');
		$user->status = 'active';
		$user->save();

		$user_id = User::max('id');

		$role = User::find($user_id);
        $role->assignRole(2);

        $customer = new Customer;
        $customer->user_id = $user_id;
        $customer->fullname = 'Miftah Rizqi Hanafi';
        $customer->address = 'Jalan raya Yogya Magelang km 3, Muntilan, Magelang, Jawa Tengah';
        $customer->avatar = 'assets/sandbox/default_avatar.png';
        $customer->sex = 'Laki-laki';
        $customer->phone = '081102726881';
        $customer->save();

        $user = new User;
		$user->email = 'rrardian@gmail.com';
		$user->password = Hash::make('rrardian');
		$user->status = 'active';
		$user->save();

		$user_id = User::max('id');

		$role = User::find($user_id);
        $role->assignRole(2);

        $customer = new Customer;
        $customer->user_id = $user_id;
        $customer->fullname = 'Rais Rahman Ardian';
        $customer->address = 'Jalan Samas km 15, Palbapang, Bantul, Yogyakarta';
        $customer->avatar = 'assets/sandbox/default_avatar.png';
        $customer->sex = 'Laki-laki';
        $customer->phone = '085729086154';
        $customer->save();
	}

}