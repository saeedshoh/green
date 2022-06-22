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
    private $gpsService;

    private $userService;

    public function __construct(GpsService $gpsService, UserService $userService)
    {
        $this->userService = $userService;
        $this->gpsService = $gpsService;
    }
    public function scan($uuid, QrCodeRequest $request)
    {
        /**
         *  Поиск по $uuid в таблице пользователей.
         */
        $user = User::whereUuid($uuid)->first();
        if ($user)
            return $this->connectScan($user, $request);

        /**
         *  Поиск по $uuid в таблице точки.
         */
        $place = Place::whereUuid($uuid)->first();
        if ($place)
            return $this->placeScan($place, $request);

        /**
         * В случае неудачи отправим текст ошибки.
         */
        return response()->json(['message' => 'Данные не найдены'], 404);
    }


    public function generate(QrCodeRequest $request)
    {
        auth()->user()->update($request->validated());

        return response()->json([
            'data' => auth()->user()->uuid
        ]);
    }

    private function connectScan($user, $request)
    {
        if ($this->gpsService->measureDistanceDetweenPoint($user->lat, $user->lng, $request->lat, $request->lng) >= 300)
            return response()->error('Ползователь не рядом с вами, пожалуйста, подойдите ближе ', 403);

        if ($user->id == auth()->user()->id)
            return response()->error('Вы не можете сканировать свой QR ', 403);

        // $this->userService->hasConnectionOnLastDay($user);

        $this->userService->addUserBalls(auth()->user(), $user);

        // $this->userService->updateUuid($user);

        return new UserResource($user);
    }

    private function placeScan($place, $request)
    {
        if ($this->gpsService->measureDistanceDetweenPoint($place->lat, $place->lng, $request->lat, $request->lng) >= 300)
            return response()->error('Точка не рядом с вами, пожалуйста, подойдите ближе ', 403);


        $this->userService->addPlaceBalls($place->points_per_visit, $place->id);

        return new PlaceResource($place);
    }
}
