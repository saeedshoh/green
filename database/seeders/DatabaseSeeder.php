<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            EmployeeSeeder::class,
            GiftSeeder::class
        ]);

        Place::factory(25)->create();
    }
}
