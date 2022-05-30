<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'nama' => 'Black Coffee',
            'deskripsi' => 'Mantap',
            'harga' => 7500,
            'gambar' => 'gambar_menu/2MI764dvrkWfwmWQvUb8ce6KYJCHXBEI3fYDYdA0.jpg'
        ]);

        Menu::create([
            'nama' => 'Martabak Manis',
            'deskripsi' => 'Mantap',
            'harga' => 20000,
            'gambar' => 'gambar_menu/P8MRGVevfHEbDk1jcEuoefy6eCgC7u8Jb9jPEM82.jpg'
        ]);

        Menu::create([
            'nama' => 'Tiramisu',
            'deskripsi' => 'Mantap',
            'harga' => 25000,
            'gambar' => 'gambar_menu/Xs39trywrQVOh3Tr9KdvboOREwswL0bfElQfaM3v.jpg'
        ]);

        Menu::create([
            'nama' => 'Seblak',
            'deskripsi' => 'Mantap',
            'harga' => 15000,
            'gambar' => 'gambar_menu/RRfqXxABvvu3Hd5lDxMVsUlqf1qJ4m7TYUNbWXO8.jpg'
        ]);

        Menu::create([
            'nama' => 'White Coffee',
            'deskripsi' => 'Mantap',
            'harga' => 10000,
            'gambar' => 'gambar_menu/yV2IYKUFHROl4gMG2I2QzE4ICksVm43UVRGRKWBI.jpg'
        ]);
    }
}
