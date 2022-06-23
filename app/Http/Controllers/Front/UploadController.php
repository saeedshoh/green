<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $dir = 'avatars')
    {
        request()->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);
        if ($request->file('avatar')) {
            $file = $request->file('avatar')->store($dir, ['disk' => 'files']);

            $user = auth()->user();
            $user->avatar = "/files/" . $file;
            $user->save();
            return response()->success("/files/" . $file, 200);
        }
    }
}
