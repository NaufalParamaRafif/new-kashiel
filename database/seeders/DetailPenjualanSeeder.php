<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\DetailPenjualan;

class DetailPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPenjualan::create([
            'jumlah_produk' => 2,
            'subtotal' => 1000.00,
            'produk_id' => 1,
            'penjualan_id' => 1,
        ]);

        DetailPenjualan::create([
            'jumlah_produk' => 1,
            'subtotal' => 150.00,
            'produk_id' => 2,
            'penjualan_id' => 2,
        ]);
    }
}
