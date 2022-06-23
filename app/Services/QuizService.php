<?php

namespace App\Services;

use App\Models\Answer;


class QuizService
{
    public function saveVariants($question, $requests)
    {
        $variants = [];
        foreach ($requests as $variant) {
            $variants[] = ['title' => $variant];
        }

        $question->variants()->createMany($variants);
    }


    public function syncVariants($question, $requests)
    {
        foreach ($requests as $id => $title) {
            $question->variants()->whereId($id)->update([
                'title'  => $title[0],
            ]);
        }
    }
}
