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
    protected $fillable = ['phone', 'name', 'uuid', 'avatar', 'lat', 'lng', 'gender', 'birthday'];


    /**
     * Диапазон запроса, считивающый лидеров.
     */
    public function scopeLeaders($query)
    {
        return $query->where('ball', '!=', 0)->orderBy('ball', 'desc');
    }
}
