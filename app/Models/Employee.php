<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Authenticatable
{
    use HasFactory, SoftDeletes;

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $fillable = ['email', 'name', 'password', 'avatar'];

    /**
     * Атрибуты, которые должны быть скрыты для сериализации.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Сохранить пароль сотрудника в формате bcrypt
     */
    public function setPasswordAttribute($password)
    {
        if($password != null) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
