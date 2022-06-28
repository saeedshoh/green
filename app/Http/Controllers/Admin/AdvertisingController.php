<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingRequest;
use App\Models\Gift;
use App\Services\ImageService;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.advertising.index')->withAdvertisings(Gift::withTrashed()->latest()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.advertising.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisingRequest $request, ImageService $imageService)
    {
        $this->validate($request, ['image' => 'required']);

        $gift = Gift::create($request->validated());

        $imageService->uploadGiftImage($gift);

        alert()->success('Успешно!', 'Реклама успешно добавлена!');

        return redirect()->route('advertisings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.advertising.show')->withAdvertising(Gift::withoutTrashed()->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function edit($gift)
    {
        return view('dashboard.advertising.edit')->withAdvertising(Gift::withoutTrashed()->findOrFail($gift));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisingRequest $request, $id, ImageService $imageService)
    {
        $gift = Gift::withoutTrashed()->findOrFail($id);

        $gift->update($request->validated());

        $imageService->uploadPlaceImage($gift);

        alert()->success('Успешно!', 'Реклама успешно обновлена!');

        return redirect()->route('advertisings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift = Gift::withoutTrashed()->findOrFail($id);

        $gift->delete();

        alert()->success('Успешно!', 'Реклама успешно удалена!');

        return back();
    }

    public function restore($id)
    {
        Gift::onlyTrashed()->findOrFail($id)->restore();

        alert()->success('Успешно!', 'Реклама успешно восстановлена!');

        return back();
    }
}
