<?php

namespace Database\Seeders;

use App\Models\Products;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }

    public function run(): void
    {
        $jsonData = file_get_contents('https://dummyjson.com/products');
        $dataArray = json_decode($jsonData, true);

        foreach ($dataArray['products'] as $product) {
            Products::create([
                'naziv' => $product['title'],
                'opis' => $product['description'],
                'cijena' => $product['price'],
                'SKU' => substr(md5($product['id']), 0, 6),
                'created_at' => now(),
                'updated_at' => now(),
                'published' => $this->faker->dateTimeBetween('-1 year', '+1 month'),
            ]);
        }
    }
}
