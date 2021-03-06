<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $fillable = ['title', 'address', 'category_id', 'working_hours', 'points_per_visit', 'uuid','phone', 'lat', 'lng'];

    /**
     * Получить категорию, которому принадлежит точки.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
