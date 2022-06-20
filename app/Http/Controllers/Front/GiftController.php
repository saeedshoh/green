<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\GiftResource;
use App\Models\Gift;

class GiftController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return response()->json([
            'data' => 'images/banner.jpg'
        ]);
        // todo
        // return new GiftResource(Gift::latest()->first());
    }
}
