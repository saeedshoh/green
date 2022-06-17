<?php

namespace App\Http\Controllers\Front;

use App\Models\Place;
use App\Http\Controllers\Controller;
use App\Http\Resources\MarkResource;

class MarkController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return MarkResource::collection(Place::select('id', 'title', 'lat', 'lng')->get());
    }
}
