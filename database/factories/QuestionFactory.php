<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'                 => $this->faker->text(20),
            'start'                 => now(),
            'ending'                => now()->addHours(5),
            'points_for_passing'    => rand(1, 9),
        ];
    }
}
