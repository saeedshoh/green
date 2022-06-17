<?php

use Illuminate\Support\Str;

if(!function_exists('generateUuid'))
{
    function generateUuid()
    {
        return Str::uuid();
    }
}
