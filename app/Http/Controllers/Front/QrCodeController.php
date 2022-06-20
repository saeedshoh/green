<?php

namespace App\Http\Controllers\Front;

use App\Models\Place;
use App\Http\Controllers\Controller;
use App\Http\Requests\QrCodeRequest;
use App\Http\Resources\PlaceResource;
use App\Services\GpsService;
use App\Services\UserService;

class QrCodeController extends Controller
{
    public function place(Place $place, QrCodeRequest $request, GpsService $gpsService, UserService $userService)
    {
        if ($gpsService->measureDistanceDetweenPoint($place->lat, $place->lng, $request->lat, $request->lng) >= 300)
            return response()->error('Заведения не рядом с вами, пожалуйста, подойдите ближе ', 403);

        // $userService->checkReceiptLastPointsFromPlace($place->id);

        $userService->addBalls($place->points_per_visit, $place->id);


        return new PlaceResource($place);
    }

    public function user($uuid)
    {
        dd($uuid);
    }
}
