<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $fillable = ['title', 'points_for_passing', 'start', 'ending'];

    /**
     * Получить все варианти опросника.
     */
    public function variants()
    {
        return $this->hasMany(Answer::class);
    }
}
