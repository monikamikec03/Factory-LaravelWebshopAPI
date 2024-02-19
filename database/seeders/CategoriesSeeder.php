<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = storage_path('json_data/topLevelCategories.json');
        $jsonData = file_get_contents($jsonPath);
        $dataArray = json_decode($jsonData, true);

        foreach ($dataArray['categories'] as $category) {
            Categories::create([
                'naziv' => $category['name'],
                'opis' => $category['description'],
                'parent_id' => $category['parent_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $jsonPath = storage_path('json_data/subCategories.json');
        $jsonData = file_get_contents($jsonPath);
        $dataArray = json_decode($jsonData, true);

        foreach ($dataArray['categories'] as $category) {
            Categories::create([
                'naziv' => $category['name'],
                'opis' => $category['description'],
                'parent_id' => $category['parent_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
