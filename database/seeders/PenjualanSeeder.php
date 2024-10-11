<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Penjualan;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penjualan::create([
            'total_harga' => 500.00,
            'pelanggan_id' => 1,
            'kasir_id' => 1,
        ]);

        Penjualan::create([
            'total_harga' => 300.00,
            'pelanggan_id' => 2,
            'kasir_id' => 1,
        ]);
    }
}
