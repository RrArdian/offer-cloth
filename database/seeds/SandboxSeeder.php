<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Http\Models\Brand;
use App\Http\Models\Customer;
use App\Http\Models\Product;
use App\Http\Models\Photo;
use App\Http\Models\Size;

class SandboxSeeder extends Seeder {

	public function run () {

		$user = new User;
		$user->email = 'kawanku@gmail.com';
		$user->password = Hash::make('kawanku');
		$user->status = 'active';
		$user->save();

		$user_id = User::max('id');

		$role = User::find($user_id);
        $role->assignRole(3);

		$brand = new Brand;
		$brand->user_id = $user_id;
		$brand->name = 'Kawanku Clothing';
		$brand->address = 'Jalan Pemuda 80 Yogyakarta';
		$brand->about = 'Muda belia gaya dan mempesona. Cukupi kebutuhan fashionmu disini.';
		$brand->phone = '08982288333';
		$brand->bbm = '2DBA789A';
		$brand->facebook = 'Kawanku Clothing';
		$brand->twitter = '@kawanku_cloth';
		$brand->save();

		for ($i=1; $i < 9 ; $i++) { 
			switch ($i) {
				case '1':
					$this->addProduct($i);
					break;
				case '2':
					$this->addProduct($i);
					break;
				case '3':
					$this->addProduct($i);
					break;
				case '4':
					$this->addProduct($i);
					break;
				case '5':
					$this->addProduct($i);
					break;
				case '6':
					$this->addProduct($i);
					break;
				case '7':
					$this->addProduct($i);
					break;
				case '8':
					$this->addProduct($i);
					break;
			}
        }
	}

	public static function addProduct($i) {
		$item_name = ['Jacket', 'Hoodie', 'Kaos', 'Kemeja', 'Short Pants', 'Long Pants', 'Topi', 'Tas'];
		$color = ['Red', 'Blue', 'Green', 'Tosca', 'Tourquish', 'Orange', 'Lavender', 'Purple', 'Deep Purple', 'Pink', 'White', 'Black'];
		$style = ['Arrival', 'Retro', 'Minimalist', 'Simple', 'Unique', 'Fresh', 'Vintage', 'Stylish', 'Cool', 'Calm'];
		$kataunik = ['Komandan', 'Kopral', 'Sersan', 'Homeless', 'Rocker', 'Freaker', 'Temporary', 'Hancur', 'Baper', 'Kuper', 'Gawl'];
		$deskripsi = ['cocok untuk bepergian ke mana-mana', 'cocok bagi anak muda yang mencari jati diri', 'dipakai untuk segala momen', 'mencerahkan penampilanmu'];
		$harga = ['200000', '250000', '300000', '350000', '400000', '450000', '500000'];
		$gambar = ['jacket_distro.jpg', 'hoodie_distro.jpg', 'kaos_distro.jpg', 'kemeja_distro.jpg', 'short_pants_distro.jpg', 'long_pants_distro.png', 'topi_distro.jpg', 'tas_distro.jpg'];

		$product = new Product;
		$product->brand_id = Brand::max('id');
		$product->category_id = $i;
		$product->name = $item_name[$i - 1] .' '. $color[rand(1, count($color) - 1)] .' '. $style[rand(1, count($style) - 1)] .' '. $kataunik[rand(1, count($kataunik) - 1)];
		$product->description = $item_name[$i - 1] .' '. $color[rand(1, count($color) - 1)] .' '. $style[rand(1, count($style) - 1)] .' '. $kataunik[rand(1, count($kataunik) - 1)] .' '. $deskripsi[rand(1, count($deskripsi) - 1)];
		$product->total_stock = rand(6, 10);
		$product->price_origin = $harga[rand(1, count($harga) - 1)];
		$product->price_discount = $harga[rand(1, count($harga) - 1)];
		$product->discount = '20';
		$product->available_from =  '2015-07-01';
		$product->available_to = '2015-07-15';
		$product->save();

		$photo = new Photo;
		$photo->product_id = Product::max('id');
		$photo->caption = $item_name[$i - 1];
		$photo->photo_name = $gambar[$i - 1];
		$photo->photo_url = 'assets/sandbox/'. $gambar[$i - 1];
		$photo->save();
	}
}