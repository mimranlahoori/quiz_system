<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Create some parent categories
        $parentCategory = Category::create([
            'slug' => 'general',
            'cate_name' => 'General',
            'cate_parent_id' => null,
        ]);

        // Create some child categories
        Category::create([
            'slug' => 'coding',
            'cate_name' => 'Coding',
            'cate_parent_id' => $parentCategory->id,
        ]);

        Category::create([
            'slug' => 'law',
            'cate_name' => 'Law',
            'cate_parent_id' => $parentCategory->id,
        ]);
    }

}
