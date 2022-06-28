<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name'          => 'Балл за U-Connect',
            'decription'    => "При сканирование U-Connect пользователю начисляются баллы, укажите количество баллов",
            'key'           => 'ball_for_u_connect',
            'value'         => 1,
            'unit'          => 'балл'
        ]);

        Setting::create([
            'name'          => 'Использование QR-Places',
            'decription'    => "Через сколько дней можно повторно сканировать QR-Places",
            'key'           => 'using_qr_places',
            'value'         => 1,
            'unit'          => 'день'
        ]);

        Setting::create([
            'name'          => 'Максимальная расстояние между адресами',
            'decription'    => "При сканировании QR вычисляется расстояние между адресами. Расстояния адресов должны быть меньше следующих значений",
            'key'           => 'maximum_distance_between_addresses',
            'value'         => 200,
            'unit'          => 'метр'
        ]);
    }
}
