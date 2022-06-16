<?php

namespace App\Http\Controllers\Admin;

use App\Models\Place;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Services\QrCodeService;
use App\Http\Requests\PlaceRequest;
use App\Http\Controllers\Controller;
use App\Services\GpsService;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.place.index')->withPlaces(Place::withTrashed()->latest()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.place.create')->withCategories(Category::select(['id', 'title'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceRequest $request, ImageService $imageService)
    {
        $place = Place::create($request->validated());

        $imageService->uploadPlaceImage($place);

        alert()->success('Успешно!', 'Заведения успешно добавлен!');

        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return view('dashboard.place.show')->withPlace($place->load('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place, GpsService $gpsService)
    {
        // dd($gpsService->distance(38.571453, 68.789827, 38.570220, 68.791975, "N"));
        dd($gpsService->haversineGreatCircleDistance(38.571407, 68.789770, 38.57124328278024, 68.78994733537819));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }


    public function qownloadQr(Place $place, QrCodeService $service)
    {
        $path = $service->generatePath($place->title);
        QrCode::margin(5)->format('png')->size(500)->generate(url('/api/place/' . $place->id . '/click'), $path);

        return response()->download($path);

    }
}
