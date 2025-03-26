<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices and accessories',
            ],
            [
                'name' => 'Clothing',
                'description' => 'Shirts, pants, and other apparel',
            ],
            [
                'name' => 'Home & Kitchen',
                'description' => 'Items for your home and kitchen',
            ],
            [
                'name' => 'Books',
                'description' => 'Physical and digital books',
            ],
        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
