<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Models\Notification as ModelsNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ConnectScannNotification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.notification.index')
            ->withNotifications(ModelsNotification::latest()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotificationRequest $request, ImageService $imageService)
    {
        $data = $request->validated() + ['img_path' => $imageService->uploadNotificationInage($request->image)];

        $users = User::whereNotNull('fcm_token')->get();

        Notification::send($users, new ConnectScannNotification($data));

        alert()->success('Успешно!', 'Уведомление успешно добавлено!');

        return redirect()->route('notifications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsNotification $notification)
    {
        return view('dashboard.notification.show')
            ->withNotification($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
