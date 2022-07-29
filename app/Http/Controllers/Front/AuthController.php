<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Services\OptService;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Services\NotificationService;
use App\Notifications\ConnectScannNotification;

class AuthController extends Controller
{
    private $optService;

    public function __construct(OptService $optService)
    {
        $this->optService = $optService;
    }

    public function sendOtp(AuthRequest $request, NotificationService $notificationService)
    {
        //todo

        // if ($this->optService->beyondLimit())
        //     return response()->error('Слишком много попыток, повторите позже!', 429);

        $opt = rand(100000, 999999);

        $this->optService->store($request, $opt);

        // $notificationService->sendSms($request->phone, $opt);

        return response()->success($opt, 200);
    }


    public function verifyOtp(AuthRequest $request, UserService $userService)
    {
        if (!$this->optService->exists($request))
            return response()->error('Введен неправильный код подтверждения', 403);

        $user = User::withTrashed()->firstOrCreate(['phone' => $request->phone], ['phone' => $request->phone, 'uuid' => generateUuid()]);

        if ($user->trashed())
            return response()->error('Вы заблокированы администраторами. Пожалуйста обратитесь к службой поддержки', 403);

        Auth::login($user);

        $this->optService->verified($request);

        $token = auth()->user()->createToken('user')->plainTextToken;

        return new AuthResource(auth()->user(), $token);
    }


    public function user()
    {
        $data = [
            'title' => 'Поздрявлеем!',
            'message' => 'Вам добавили балл',
            'img_path'  => '',
        ];
        $user2 = User::find(1);

        $user2->notify(new ConnectScannNotification($data));

        // return new UserResource(auth()->user());
    }


    public function fcmToken(Request $request)
    {
        $this->validate($request, ['fcm_token' => 'required|min:6']);

        auth()->user()->update(['fcm_token' => $request->fcm_token]);

        return response()->success('FCM Token created successfully', 201);
    }
}
