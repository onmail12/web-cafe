<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Meja;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'nama_menu' => 'burger',
            'harga' => '30000',
            'gambar' => 'kentang.jpg',
            'deskripsi' => 'burger tes deskripsi',
            'keterangan' => 'makanan',
        ]);
        Menu::create([
            'nama_menu' => 'kopi',
            'harga' => '20000',
            'gambar' => 'gallary-1.jpg',
            'deskripsi' => 'kopi tes deskripsi',
            'keterangan' => 'minuman',
        ]);

        Meja::create();
        Meja::create();
        Meja::create();
    }
}
