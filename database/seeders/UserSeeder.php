<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['name' => 'Саидшох Баротов',  'avatar' => 'images/default.png', 'phone' => '902222900', 'uuid' => generateUuid(), 'ball' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ахмадчони М.',  'avatar' => 'images/01.png', 'phone' => '934737318', 'uuid' => generateUuid(), 'ball' => 556, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Шахриёр Гафуров',  'avatar' => 'images/022.png',  'phone' => '933713121', 'uuid' => generateUuid(), 'ball' => 557, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Zafar Davronovich',  'avatar' => 'images/default.png',  'phone' => '930000000', 'uuid' => generateUuid(), 'ball' => 450, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
