<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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


    public function getStartAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getEndingAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
