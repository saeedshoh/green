<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['title' => 'Магазины', 'icon' => 'images/stores.png', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Общ.Места', 'icon' => 'images/all.png',  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Офисы', 'icon' => 'images/office.png',  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Военкоматы', 'icon' => 'images/default-place.png',  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Спортзалы',  'icon' => 'images/default-place.png',  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
