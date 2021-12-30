<?php

use App\Http\Controllers\SpContoller;
use App\Http\Controllers\SpcContoller;
use App\Http\Controllers\CustomerInformationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// customer Route
Route::get('/customer', [CustomerInformationController::class, 'index']);
Route::get('/customer/{id}', [CustomerInformationController::class, 'show']);
Route::post('/customer', [CustomerInformationController::class, 'store']);
Route::put('/customer/{id}', [CustomerInformationController::class, 'update']);

// service provider category Route
Route::get('/spc', [SpcContoller::class, 'index']);
Route::get('/spc/{id}', [SpcContoller::class, 'show']);
Route::post('/spc', [SpcContoller::class, 'store']);
Route::put('/spc/{id}', [SpcContoller::class, 'update']);

// service provider Route
Route::get('/sp', [SpContoller::class, 'index']);
Route::get('/sp/{id}', [SpContoller::class, 'show']);
Route::post('/sp', [SpContoller::class, 'store']);