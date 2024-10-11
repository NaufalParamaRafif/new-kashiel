<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama_produk' => 'Laptop',
            'harga' => 1000.00,
            'stok' => 50,
            'category_id' => 1,  // Assuming this category exists
        ]);

        Product::create([
            'nama_produk' => 'Table',
            'harga' => 150.00,
            'stok' => 100,
            'category_id' => 2,
        ]);

        Product::create([
            'nama_produk' => 'T-Shirt',
            'harga' => 20.00,
            'stok' => 200,
            'category_id' => 3,
        ]);
    }
}
