<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Place;
use App\Services\GpsService;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\QrCodeRequest;
use App\Http\Resources\PlaceResource;
use App\Http\Resources\UserResource;

class QrCodeController extends Controller
{
    public function place(Place $place, QrCodeRequest $request, GpsService $gpsService, UserService $userService)
    {
        if ($gpsService->measureDistanceDetweenPoint($place->lat, $place->lng, $request->lat, $request->lng) >= 300)
            return response()->error('Точка не рядом с вами, пожалуйста, подойдите ближе ', 403);

        // $userService->checkReceiptLastPointsFromPlace($place->id);

        $userService->addPlaceBalls($place->points_per_visit, $place->id);


        return new PlaceResource($place);
    }

    public function user($uuid, QrCodeRequest $request, GpsService $gpsService, UserService $userService)
    {
        $user = User::whereUuid($uuid)->firstOrFail();

        if ($gpsService->measureDistanceDetweenPoint($user->lat, $user->lng, $request->lat, $request->lng) >= 300)
            return response()->error('Ползователь не рядом с вами, пожалуйста, подойдите ближе ', 403);

        $userService->addUserBalls(auth()->user(), $user);

        $userService->updateUuid($user);

        return new UserResource($user);

    }


    public function generate(QrCodeRequest $request)
    {
        auth()->user()->update($request->validated());

        return response()->json([
            'data' => auth()->user()->uuid
        ]);
    }
}
