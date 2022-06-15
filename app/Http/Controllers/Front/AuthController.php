<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Services\OptService;
use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $optService;

    public function __construct(OptService $optService)
    {
        $this->optService = $optService;
    }

    public function sendOtp(AuthRequest $request)
    {
        if ($this->optService->beyondLimit())
            return response()->error('Слишком много попыток, повторите позже!', 429);

        $opt = rand(100000, 999999);

        $this->optService->store($request, $opt);

        return response()->success('Ваш код для подтверждения:' . $opt, 200);
    }


    public function verifyOtp(AuthRequest $request)
    {
        if (!$this->optService->exists($request)) {
            return response()->error('Введен неправильный код подтверждения', 403);
        }

        $user = User::withTrashed()->firstOrCreate(['phone' => $request->phone]);

        Auth::login($user);

        $this->optService->verified($request);

        $token = auth()->user()->createToken('user')->plainTextToken;

        return new UserResource(auth()->user(), $token);
    }



}
