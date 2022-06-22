<?php

namespace Database\Seeders;

use App\Models\Question;
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
            GiftSeeder::class
        ]);

        // Place::factory(25)->create();
        // Question::factory(3)->create();
    }
}
