<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\{AdvertisingController, AuthController, UserController, PlaceController, CategoryController, EmployeeController, NotificationController, PlaceOnMapController, QuizController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [AuthController::class, 'showForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('admin.login');


Route::middleware(['auth:employee'])->group(function () {
    Route::resources([
        'users'                     => UserController::class,
        'employees'                 => EmployeeController::class,
        'places'                    => PlaceController::class,
        'categories'                => CategoryController::class,
        'quizzes'                   => QuizController::class,
        'advertisings'              => AdvertisingController::class,
        'settings'                  => SettingController::class,
        'notifications'             => NotificationController::class,
    ]);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('')->group(function () {
    Route::get('leaders', [LeaderController::class, 'index'])->name('leaders.show');
    Route::get('leaders/history/{user}', [LeaderController::class, 'history'])->name('leaders.history');
    Route::get('map/places', PlaceOnMapController::class)->name('places.map');
    Route::put('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::put('employees/{employee}/restore', [EmployeeController::class, 'restore'])->name('employees.restore');
    Route::put('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::put('places/{place}/restore', [PlaceController::class, 'restore'])->name('places.restore');
    Route::put('quizzes/{quiz}/restore', [QuizController::class, 'restore'])->name('quizzes.restore');
    Route::put('advertisings/{advertising}/restore', [AdvertisingController::class, 'restore'])->name('advertisings.restore');
    Route::get('places/{place}/download-qr', [PlaceController::class, 'qownloadQr'])->name('places.qrcode');
});

