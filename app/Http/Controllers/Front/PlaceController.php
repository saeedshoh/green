<?php

namespace App\Http\Controllers\Front;

use App\Models\Place;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlaceResource;

class PlaceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Place $place)
    {
        return new PlaceResource($place);
    }
}
