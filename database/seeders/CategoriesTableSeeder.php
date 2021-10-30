<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Đồ điện tử']);
        Category::create(['name' => 'Điện thoại', 'parent_id' => 1]);
        Category::create(['name' => 'Tablet', 'parent_id' => 1]);
        Category::create(['name' => 'Laptop', 'parent_id' => 1]);
        Category::create(['name' => 'Smart Watch', 'parent_id' => 1]);
        Category::create(['name' => 'Máy in', 'parent_id' => 1]);
        Category::create(['name' => 'Đồ nội thất']);
        Category::create(['name' => 'Ghế', 'parent_id' => 2]);
        Category::create(['name' => 'Ghế', 'parent_id' => 2]);
        Category::create(['name' => 'Tủ', 'parent_id' => 2]);
    }
}
