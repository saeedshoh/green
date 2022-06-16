<?php

namespace App\Services;

use Illuminate\Support\Str;

class QrCodeService
{
    public function generatePath($string)
    {
        return public_path('/images/' . Str::of($string)->slug('_')->value .'_'.rand(1, 5000000000). '.png');
    }
}
