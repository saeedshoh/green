<?php

namespace Database\Seeders;

use App\Models\Gift;
use Illuminate\Database\Seeder;

class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gift::insert([
            ['title' => 'Соберай баллы сканируя QR коды', 'image'=> 'images/banner.jpg', 'description' => 'iPhone 12 Pro Max Black Edition', 'deadline' => '2019-12-31', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

