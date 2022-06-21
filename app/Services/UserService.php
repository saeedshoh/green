<?php

namespace App\Services;

use App\Models\Ball;

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
            'type'      => 'place'
        ]);
    }

    /**
     * Проверка получение последний баллов от точки
     */
    public function checkReceiptLastPointsFromPlace($place_id)
    {
        return  Ball::where(['user_id', auth()->user()->id, 'model_id' => $place_id, 'type' =>  'place']);
    }


    public function addUserBalls($user1, $user2)
    {
        $user1->increment('ball');
        $user1->save();

        $user2->increment('ball');
        $user2->save();
    }

    public function updateUuid($user)
    {
        $user->uuid = generateUuid();
        $user->save();

    }

}
