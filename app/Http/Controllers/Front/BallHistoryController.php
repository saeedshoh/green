<?php

namespace App\Http\Controllers\Front;

use App\Models\Ball;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BallHistoryResource;

class BallHistoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return BallHistoryResource::collection(Ball::where('user_id', auth()->user()->id)->latest()->paginate(20));
    }
}
