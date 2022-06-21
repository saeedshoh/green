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
        $place = Place::create($request->validated() + ['uuid' => generateUuid()]);

        $imageService->uploadPlaceImage($place);

        alert()->success('Успешно!', 'Точка успешно добавлена!');

        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show($place)
    {
        $place = Place::withTrashed()->findOrFail($place);

        return view('dashboard.place.show')->withPlace($place->load('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('dashboard.place.edit')->with([
            'place'         => $place,
            'categories'   => Category::select(['id', 'title'])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(PlaceRequest $request, Place $place, ImageService $imageService)
    {
        $place->update($request->validated());

        $imageService->uploadPlaceImage($place);

        alert()->success('Успешно!', 'Точка успешно обновлена!');

        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();

        alert()->success('Успешно!', 'Точка успешно удалена!');

        return back();
    }

    public function restore($place)
    {
        Place::onlyTrashed()->findOrFail($place)->restore();

        alert()->success('Успешно!', 'Точка успешно восстановлена!');

        return back();
    }


    public function qownloadQr(Place $place, QrCodeService $service)
    {
        $path = $service->generatePath($place->title);
        QrCode::margin(5)->format('png')->size(500)->generate($place->uuid, $path);

        return response()->download($path);
    }
}
