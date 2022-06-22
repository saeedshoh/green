<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::insert([
            ['title' => 'Пройдите опрос и получите баллы', 'points_for_passing' => 2, 'start' => now(), 'ending' => now()->addHours(1), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Какой город лишный', 'points_for_passing' => 3, 'start' => now()->addHours(2), 'ending' => now()->addHours(3), 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Баландтарин куллаи кухи Точикистон чи ном дорад?', 'points_for_passing' => 5, 'start' => now()->addHours(4), 'ending' => now()->addHours(7), 'created_at' => now(), 'updated_at' => now()],
        ]);

        Answer::insert([
            ['title' => 'Фиолетовый', 'question_id' => 1,  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Зеленый', 'question_id' => 1,  'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Душанбе', 'question_id' => 2,  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Кулоб', 'question_id' => 2,  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Вахдат', 'question_id' => 2,  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Хучанд', 'question_id' => 2,  'created_at' => now(), 'updated_at' => now()],

            ['title' => 'Ленин', 'question_id' => 3,  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Эверест', 'question_id' => 3,  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Жилонтощ', 'question_id' => 3,  'created_at' => now(), 'updated_at' => now()],
            ['title' => 'И.Сомонц', 'question_id' => 3,  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
