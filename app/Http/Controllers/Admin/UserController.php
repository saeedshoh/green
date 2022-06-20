<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\ImageService;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index')->withUsers(User::withTrashed()->latest()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, ImageService $imageService)
    {
        $user = User::create($request->validated());

        $imageService->uploadImage($user);

        alert()->success('Успешно!', 'Пользователь успешно добавлен!');

        return redirect()->route('users.index');
    }

      /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::withTrashed()->findOrFail($user);

        return view('dashboard.user.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user, ImageService $imageService)
    {
        $user->update($request->validated());

        $imageService->uploadImage($user);

        alert()->success('Успешно!', 'Участник успешно обновлен!');

        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        alert()->success('Успешно!', 'Пользователь успешно удален!');

        return back();

    }

    public function restore($user)
    {
        User::onlyTrashed()->findOrFail($user)->restore();

        alert()->success('Успешно!', 'Пользователь успешно восстановлен!');

        return back();
    }

}
