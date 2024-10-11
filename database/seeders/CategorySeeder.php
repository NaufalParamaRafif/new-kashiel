<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Books',
            'slug' => 'books',
        ]);

        Category::create([
            'name' => 'Beauty & Health',
            'slug' => 'beauty-health',
        ]);

        Category::create([
            'name' => 'Toys',
            'slug' => 'toys',
        ]);

        Category::create([
            'name' => 'Sports',
            'slug' => 'sports',
        ]);

        Category::create([
            'name' => 'Groceries',
            'slug' => 'groceries',
        ]);

        Category::create([
            'name' => 'Automotive',
            'slug' => 'automotive',
        ]);

        Category::create([
            'name' => 'Home Appliances',
            'slug' => 'home-appliances',
        ]);

        Category::create([
            'name' => 'Jewelry',
            'slug' => 'jewelry',
        ]);

        Category::create([
            'name' => 'Stationery',
            'slug' => 'stationery',
        ]);

        Category::create([
            'name' => 'Pet Supplies',
            'slug' => 'pet-supplies',
        ]);

        Category::create([
            'name' => 'Garden & Outdoor',
            'slug' => 'garden-outdoor',
        ]);

        Category::create([
            'name' => 'Office Equipment',
            'slug' => 'office-equipment',
        ]);
    }
}
