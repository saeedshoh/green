<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gift extends Model
{
    use HasFactory;

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $fillable = ['title', 'image', 'description', 'deadline'];


    public function getDeadlineAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }
}
