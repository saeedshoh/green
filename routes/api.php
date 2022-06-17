<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\GiftController;
use App\Http\Controllers\Front\MarkController;
use App\Http\Controllers\Front\{AuthController, CategoryController, LeaderController, LogoutController, PlaceController, QrCodeController};;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('send-otp', [AuthController::class, 'sendOtp']);
    Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
    Route::get('logout', LogoutController::class)->middleware('auth:sanctum');
});


/*
|-------------------------------------------------------------------------
| API Routes for client
|-------------------------------------------------------------------------
*/
Route::prefix('profile')->middleware(['auth:sanctum',])->group(function () {
    Route::get('gift', GiftController::class);
    Route::get('leaders', LeaderController::class);
    Route::get('marks', MarkController::class);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);
    Route::get('places/{place}', PlaceController::class);
});


/*
|-------------------------------------------------------------------------
| API Routes for qrcode
|-------------------------------------------------------------------------
*/
Route::prefix('qrcode')->middleware(['auth:sanctum',])->group(function () {
    Route::post('place/{place}', [QrCodeController::class, 'place']);
    Route::post('user/{uuid}', [QrCodeController::class, 'user']);
});
