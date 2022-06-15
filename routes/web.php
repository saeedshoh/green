<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmployeeController;

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
        'employees'                 => EmployeeController::class
    ]);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('')->group(function () {
    Route::put('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::put('employees/{employee}/restore', [EmployeeController::class, 'restore'])->name('employees.restore');
});

