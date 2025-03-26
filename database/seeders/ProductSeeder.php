<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Smartphone X',
                'description' => 'The latest smartphone with advanced features',
                'price' => 999.99,
                'stock' => 50,
                'category_id' => 1,
            ],
            [
                'name' => 'Laptop Pro',
                'description' => 'Powerful laptop for professionals',
                'price' => 1499.99,
                'stock' => 25,
                'category_id' => 1,
            ],
            [
                'name' => 'Cotton T-Shirt',
                'description' => 'Comfortable cotton t-shirt',
                'price' => 19.99,
                'stock' => 100,
                'category_id' => 2,
            ],
            [
                'name' => 'Jeans',
                'description' => 'Classic blue jeans',
                'price' => 49.99,
                'stock' => 75,
                'category_id' => 2,
            ],
            [
                'name' => 'Coffee Maker',
                'description' => 'Automatic coffee maker for your kitchen',
                'price' => 89.99,
                'stock' => 30,
                'category_id' => 3,
            ],
            [
                'name' => 'Blender',
                'description' => 'High-speed blender for smoothies and more',
                'price' => 69.99,
                'stock' => 40,
                'category_id' => 3,
            ],
            [
                'name' => 'Programming Guide',
                'description' => 'Comprehensive guide to programming',
                'price' => 29.99,
                'stock' => 60,
                'category_id' => 4,
            ],
            [
                'name' => 'Novel Collection',
                'description' => 'Collection of bestselling novels',
                'price' => 39.99,
                'stock' => 45,
                'category_id' => 4,
            ],
            [
                'name' => 'Wireless Earbuds',
                'description' => 'High-quality wireless earbuds',
                'price' => 129.99,
                'stock' => 35,
                'category_id' => 1,
            ],
            [
                'name' => 'Smart Watch',
                'description' => 'Feature-rich smart watch',
                'price' => 199.99,
                'stock' => 20,
                'category_id' => 1,
            ],
            [
                'name' => 'Winter Jacket',
                'description' => 'Warm winter jacket',
                'price' => 89.99,
                'stock' => 55,
                'category_id' => 2,
            ],
            [
                'name' => 'Kitchen Knife Set',
                'description' => 'Professional kitchen knife set',
                'price' => 149.99,
                'stock' => 15,
                'category_id' => 3,
            ],
        ];
        
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
