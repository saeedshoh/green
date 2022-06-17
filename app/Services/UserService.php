<?php

namespace App\Services;

use App\Models\Ball;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * Добавить балл пользователю
     */
    public function addBalls($ball, $place_id)
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
     * Проверка получение последний баллов от заведения
     */
    public function checkReceiptLastPointsFromPlace($place_id)
    {
        return  Ball::where(['user_id', auth()->user()->id, 'model_id' => $place_id, 'type' =>  'place']);
    }
}
