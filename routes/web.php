<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController, UserController, PlaceController, CategoryController, EmployeeController, QuizController};

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
        'quizzes'                   => QuizController::class
    ]);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('')->group(function () {
    Route::put('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::put('employees/{employee}/restore', [EmployeeController::class, 'restore'])->name('employees.restore');
    Route::put('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::put('places/{place}/restore', [PlaceController::class, 'restore'])->name('places.restore');
    Route::put('quizzes/{quiz}/restore', [QuizController::class, 'restore'])->name('quizzes.restore');
    Route::get('places/{place}/download-qr', [PlaceController::class, 'qownloadQr'])->name('places.qrcode');
});

