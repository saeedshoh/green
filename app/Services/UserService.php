<?php

namespace App\Services;

use App\Models\Ball;
use App\Models\User;
use App\Models\Place;

class UserService
{
    /**
     * Добавить балл пользователю
     */
    public function addPlaceBalls($ball, $place_id)
    {
        $user = auth()->user();
        $user->increment('ball', $ball);
        $user->save();

        Ball::create([
            'user_id'   => auth()->user()->id,
            'model_id'  => $place_id,
            'type'      => 'place',
            'ball'      => $ball
        ]);
    }


    /**
     * Добавить балл пользователю за прохождение опросника
     */
    public function addQuizBalls($question)
    {
        $user = auth()->user();
        $user->increment('ball', $question->points_for_passing);
        $user->save();

        Ball::create([
            'user_id'   => auth()->user()->id,
            'model_id'  => $question->id,
            'type'      => 'quiz',
            'ball'      => $question->points_for_passing
        ]);
    }

    public function addUserBalls($user1, $user2)
    {

        $user1->increment('ball');
        $user1->save();

        $user2->increment('ball');
        $user2->save();

        Ball::create([
            'user_id'   => $user1->id,
            'model_id'  => $user2->id,
            'type'      => 'connect',
            'ball'      => 1,
        ]);

        Ball::create([
            'user_id'   => $user2->id,
            'model_id'  => $user1->id,
            'type'      => 'connect',
            'ball'      => 1,
        ]);
    }

    public function updateUuid($user)
    {
        $user->uuid = generateUuid();
        $user->save();
    }

    /**
     * Проверка получение последний баллов от точки
     */
    public function checkReceiptLastPointsFromPlace($place_id)
    {
        return  Ball::where(['user_id', auth()->user()->id, 'model_id' => $place_id, 'type' =>  'place']);
    }

    public function hasConnectScanOnLastDay(User $user)
    {
        $lastConnect = auth()->user()->connectBalls()->where('model_id', $user->id)->latest()->first();

        if ($lastConnect && now()->subDay() < $lastConnect->created_at)
            return true;

        return false;
    }

    public function hasPlaceScanOnLastDay(Place $place)
    {
        $lastConnect = auth()->user()->placeBalls()->where('model_id', $place->id)->latest()->first();

        if ($lastConnect && now()->subDay() < $lastConnect->created_at)
            return true;

        return false;
    }


    public function isAnswerFromQuiz($question)
    {
        return auth()->user()->quizzes()->where('question_id', $question)->exists();

    }
}
