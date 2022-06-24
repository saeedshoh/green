<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::create([
            'title'             => 'Tcell Plaza',
            'address'           => 'проспект Рудаки 34',
            'image'             => '/files/place/SbMZpm2Eewfn4LOyL8rkHeudpuAa3SMAPfQXz6Nm.jpg',
            'working_hours'     => '08:00 - 15:00',
            'points_per_visit'  => 10,
            'phone'             => '+992 37 223 2121',
            'lat'               => '38.5702407402598300',
            'lng'               => '68.7922693669843900',
            'category_id'       => 3
        ]);
    }
}
