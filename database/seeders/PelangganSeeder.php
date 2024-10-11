<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'nama_pelanggan' => 'John Doe',
            'alamat' => '123 Main St, City, Country',
            'nomor_tlp' => '08123456789',
        ]);

        Pelanggan::create([
            'nama_pelanggan' => 'Jane Smith',
            'alamat' => '456 Second St, City, Country',
            'nomor_tlp' => '08129876543',
        ]);
    }
}
