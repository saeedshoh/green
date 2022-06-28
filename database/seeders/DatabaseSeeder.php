<?php

namespace Database\Seeders;

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
            UserSeeder::class,
            CategorySeeder::class,
            EmployeeSeeder::class,
            GiftSeeder::class,
            QuestionSeeder::class,
            PlaceSeeder::class,
            SettingSeeder::class,
        ]);

        // Place::factory(25)->create();
        // Question::factory(3)->create();
    }
}
