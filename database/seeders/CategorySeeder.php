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
            ['title' => 'Магазины', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Общ.Места', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Офисы', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Военкоматы', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Спортзалы', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
