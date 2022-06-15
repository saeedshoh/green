<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::insert([
            ['name' => 'Админ Админов', 'email' => 'admin@example.com', 'password' => bcrypt('password'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Рахимов Джамил', 'email' => 'moderator@example.com', 'password' => bcrypt('password'), 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
