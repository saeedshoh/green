<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'             => $this->faker->text(20),
            'address'           => $this->faker->address(),
            'image'             => 'images/logo_tcell.svg',
            'working_hours'     => '24/7',
            'points_per_visit'  => rand(1, 9),
            'phone'             => $this->faker->phoneNumber(),
            'lat'               => $this->faker->latitude(),
            'lng'               => $this->faker->longitude(),
            'category_id'       => Category::all()->random()->id

        ];
    }
}
