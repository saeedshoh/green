<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $fillable = ['phone', 'name', 'uuid', 'avatar', 'lat', 'lng', 'fcm_token', 'gender', 'birthday'];


    /**
     * Диапазон запроса, считивающый лидеров.
     */
    public function scopeLeaders($query)
    {
        return $query->where('ball', '!=', 0)->orderBy('ball', 'desc');
    }


    /**
     * Получить средное время ответа.
     *
     * @param  string  $value
     * @return string
     */
    public function getPositionAttribute($value)
    {
        $users = User::leaders()->pluck('id')->toArray();

        return $users && $this->ball != 0 ? array_search($this->id, $users) + 1 : 0;
    }


    // todo

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($user) {
            $user->avatar = 'images/default.png';
            $user->save();
        });
    }

    public function balls()
    {
        return $this->hasMany(Ball::class);
    }

    public function connectBalls()
    {
        return $this->balls()->where('type', 'connect');
    }

    public function placeBalls()
    {
        return $this->balls()->where('type', 'place');
    }

    public function quizBalls()
    {
        return $this->balls()->where('type', 'quiz');
    }

    public function quizzes()
    {
        return $this->belongsToMany(Question::class, 'quiz_user')->withPivot('answer_id')->withTimestamps();
    }

    /**
     * Specifies the user's FCM token
     *
     * @return string|array
     */
    public function routeNotificationForFcm()
    {
        return $this->fcm_token;
    }
}
