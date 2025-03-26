<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $blogCategories = [
            [
                'name' => 'Technology',
                'description' => 'Articles about technology and gadgets',
            ],
            [
                'name' => 'Fashion',
                'description' => 'Fashion trends and tips',
            ],
            [
                'name' => 'Cooking',
                'description' => 'Recipes and cooking tips',
            ],
            [
                'name' => 'Travel',
                'description' => 'Travel destinations and guides',
            ],
        ];
        
        foreach ($blogCategories as $category) {
            BlogCategory::create($category);
        }
    }
}
