<?php

use App\Http\Controllers\AdminEventLogController;
use App\Http\Controllers\CustomerEventLogController;
use App\Http\Controllers\SpcTarifController;
use App\Http\Controllers\SpInformaionContoller;
use App\Http\Controllers\SpcEventLogController;
use App\Http\Controllers\SpcContoller;
use App\Http\Controllers\CustomerInformationController;
use App\Http\Controllers\AdminInformationController;
use App\Http\Controllers\MeterInfromationController;
use App\Http\Controllers\SpEmployeeEventLogController;
use App\Http\Controllers\SpEmployeeInformationController;
use App\Http\Controllers\SpEventLogController;
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

####################################################################################################
// customer Route
Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerInformationController::class, 'index']);
    Route::get('/{id}', [CustomerInformationController::class, 'show']);
    Route::post('', [CustomerInformationController::class, 'store']);
    Route::put('/{id}', [CustomerInformationController::class, 'update']);
    // customer event log Route
    Route::prefix('/eventlog')->group(function () {
        Route::get('/customer/{id}', [CustomerEventLogController::class, 'index']); 
        Route::get('/{id}', [CustomerEventLogController::class, 'show']); 
        Route::post('/', [CustomerEventLogController::class, 'store']);
    });
});


####################################################################################################
// service provider category Route
Route::prefix('spc')->group(function () {
    Route::get('/', [SpcContoller::class, 'index']);
    Route::get('/{id}', [SpcContoller::class, 'show']);
    Route::post('/', [SpcContoller::class, 'store']);
    Route::put('/{id}', [SpcContoller::class, 'update']);
    // spc eventlog Route
    Route::prefix('/eventlog')->group(function () {
        Route::get('/spc/{id}', [SpcEventLogController::class, 'index']); 
        Route::get('/{id}', [SpcEventLogController::class, 'show']); 
        Route::post('/', [SpcEventLogController::class, 'store']);
    });
    // spc tarif Route
    Route::prefix('/tarif')->group(function () {
        Route::get('/spc/{id}', [SpcTarifController::class, 'index']);
        Route::get('/{id}', [SpcTarifController::class, 'show']); 
        Route::post('/', [SpcTarifController::class, 'store']);
        Route::put('/{id}', [SpcTarifController::class, 'update']);
    });    
});



####################################################################################################

// service provider Route
Route::prefix('sp')->group(function () {
    Route::get('/', [SpInformaionContoller::class, 'index']);
    Route::get('/{id}', [SpInformaionContoller::class, 'show']);
    Route::post('/', [SpInformaionContoller::class, 'store']);
    Route::put('/{id}', [SpInformaionContoller::class, 'update']);
    // sp eventlog Route
    Route::prefix('/eventlog')->group(function () {
        Route::get('/sp/{id}', [SpEventLogController::class, 'index']);
        Route::get('/{id}', [SpEventLogController::class, 'show']);
        Route::post('/', [SpEventLogController::class, 'store']);
    });
    // sp meter information
    Route::prefix('/meter')->group(function () {
        Route::get('/sp/{id}', [MeterInfromationController::class, 'index']);
        Route::get('/{id}', [MeterInfromationController::class, 'show']);
        Route::post('/', [MeterInfromationController::class, 'store']);
        Route::put('/{id}', [MeterInfromationController::class, 'update']);
    });
});



####################################################################################################

// sp employee Route
Route::prefix('spemployee')->group(function () {
    Route::get('/', [SpEmployeeInformationController::class, 'index']);
    Route::get('/{id}', [SpEmployeeInformationController::class, 'show']);
    Route::put('/{id}', [SpEmployeeInformationController::class, 'update']);
    Route::post('/', [SpEmployeeInformationController::class, 'store']);
    // sp employee eventlog Route
    Route::prefix('/eventlog')->group(function () {
        Route::get('/spemployee/{id}', [SpEmployeeEventLogController::class, 'index']);
        Route::get('/{id}', [SpEmployeeEventLogController::class, 'show']);
        Route::post('/', [SpEmployeeEventLogController::class, 'store']);
    });
    
});


#####################################################################################################

//Admin Route
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminInformationController::class, 'index']);
    Route::get('/{id}', [AdminInformationController::class, 'show']);
    Route::post('/', [AdminInformationController::class, 'store']);
    Route::put('/{id}', [AdminInformationController::class, 'update']); 
    // Admin event log Route
    Route::prefix('/eventlog')->group(function () {
        Route::get('/admin/{id}', [AdminEventLogController::class, 'index']);
        Route::get('/{id}', [AdminEventLogController::class, 'show']);
        Route::post('/', [AdminEventLogController::class, 'store']);
    });
});