<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = Products::all();
        foreach ($products as $product) {
            $category = Categories::inRandomOrder()->limit(1)->get();
            $product->categories()->attach($category, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
