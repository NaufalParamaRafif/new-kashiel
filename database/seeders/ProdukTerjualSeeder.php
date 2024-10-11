<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ProdukTerjual;

class ProdukTerjualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProdukTerjual::create([
            'jumlah_produk' => 2,
            'harga' => 1000.00,
            'produk_id' => 1,
            'penjualan_id' => 1,
        ]);

        ProdukTerjual::create([
            'jumlah_produk' => 1,
            'harga' => 150.00,
            'produk_id' => 2,
            'penjualan_id' => 2,
        ]);
    }
}
