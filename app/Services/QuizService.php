<?php

namespace App\Services;

use App\Models\Answer;


class QuizService
{
    public function syncVariants($question, $requests)
    {
        $variants = [];
        foreach ($requests as $variant) {
            $variants[] = ['title' => $variant];
        }

        $question->variants()->createMany($variants);
    }
}
