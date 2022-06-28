<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use App\Http\Controllers\Controller;

class PlaceOnMapController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('dashboard.map.places')->withMarks(Place::select(['lat', 'lng', 'title'])->get());
    }
}
