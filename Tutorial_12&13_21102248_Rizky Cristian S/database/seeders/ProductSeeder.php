<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'HP Spectre',
                'price' => 25000000
            ],
            [
                'name' => 'Acer Nitro',
                'price' => 15000000
            ],
            [
                'name' => 'Asus ROG',
                'price' => 15000000
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
