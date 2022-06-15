<?php

namespace App\Services;

use App\Models\Otp;
use Illuminate\Support\Facades\DB;


class OptService
{
    public function beyondLimit()
    {
        return Otp::where('phone', request()->phone)->where('qty', '>=', 5)->where('updated_at', '>', now()->subMinutes(15)->format('Y-m-d H:i:s'))->exists();
    }

    
    public function store($request, $opt)
    {
        Otp::updateOrCreate(
            ['phone' => $request->phone],
            ['confirm_code' => $opt, 'qty' =>  DB::raw('qty + 1'), 'checked' => false]
        );
    }

    public function exists($request)
    {
        return Otp::whereConfirmCode($request->confirm_code)
            ->wherePhone($request->phone)
            ->whereChecked(false)
            ->first();
    }

    public function verified($request)
    {
        return Otp::whereConfirmCode($request->confirm_code)
            ->wherePhone($request->phone)
            ->whereChecked(false)
            ->update(['checked' => true]);
    }
}
