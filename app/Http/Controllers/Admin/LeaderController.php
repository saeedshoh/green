<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ball;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaderController extends Controller
{
    public function index()
    {
        return view('dashboard.leader.index')->withLeaders(
            User::leaders()->paginate()
        );
    }

    public function history($user)
    {
        return view('dashboard.leader.history')->withBalls(
            Ball::where('user_id', $user)->latest()->paginate(20)
        );
    }
}
