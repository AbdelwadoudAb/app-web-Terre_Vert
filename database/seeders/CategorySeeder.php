<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::firstOrCreate([
            'name' => 'Légumes',
        ]);

        Category::firstOrCreate([
            'name' => 'Fruits',
        ]);

        Category::firstOrCreate([
            'name' => 'Céréales',
        ]);

        Category::firstOrCreate([
            'name' => 'Produits naturels',
        ]);
    }
}