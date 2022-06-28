<?php

use App\Models\User;
use App\Models\Place;
use App\Models\Question;
use Illuminate\Support\Str;

if (!function_exists('generateUuid')) {
    function generateUuid()
    {
        return Str::uuid();
    }
}

if (!function_exists('getPlaceName')) {
    function getPlaceName($id)
    {
        return Place::find($id)->title;
    }
}

if (!function_exists('getUserName')) {
    function getUserName($id)
    {
        return User::find($id)->name;
    }
}

if (!function_exists('getQuizName')) {
    function getQuizName($id)
    {
        return Question::find($id)->title;
    }
}

