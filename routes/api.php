<?php

use App\Http\Controllers\AdminEventLogController;
use App\Http\Controllers\CustomerEventLogController;
use App\Http\Controllers\SpcTarifController;
use App\Http\Controllers\SpInformaionContoller;
use App\Http\Controllers\SpcEventLogController;
use App\Http\Controllers\SpcContoller;
use App\Http\Controllers\CustomerInformationController;
use App\Http\Controllers\AdminInformationController;
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
Route::get('/customer', [CustomerInformationController::class, 'index']);
Route::get('/customer/{id}', [CustomerInformationController::class, 'show']);
Route::post('/customer', [CustomerInformationController::class, 'store']);
Route::put('/customer/{id}', [CustomerInformationController::class, 'update']);
// customer event log Route
Route::get('/customer/eventlog/customer/{id}', [CustomerEventLogController::class, 'index']); 
Route::get('/customer/eventlog/{id}', [CustomerEventLogController::class, 'show']); 
Route::post('/customer/eventlog', [CustomerEventLogController::class, 'store']);

####################################################################################################
// service provider category Route
Route::get('/spc', [SpcContoller::class, 'index']);
Route::get('/spc/{id}', [SpcContoller::class, 'show']);
Route::post('/spc', [SpcContoller::class, 'store']);
Route::put('/spc/{id}', [SpcContoller::class, 'update']);
// spc eventlog Route
Route::get('/spc/eventlog/spc/{id}', [SpcEventLogController::class, 'index']); 
Route::get('/spc/eventlog/{id}', [SpcEventLogController::class, 'show']); 
Route::post('/spc/eventlog', [SpcEventLogController::class, 'store']);
// spc tarif Route
Route::get('/spc/tarif/spc/{id}', [SpcTarifController::class, 'index']);
Route::get('/spc/tarif/{id}', [SpcTarifController::class, 'show']); 
Route::post('/spc/tarif', [SpcTarifController::class, 'store']);
Route::put('/spc/tarif/{id}', [SpcTarifController::class, 'update']);

####################################################################################################

// service provider Route
Route::get('/sp', [SpInformaionContoller::class, 'index']);
Route::get('/sp/{id}', [SpInformaionContoller::class, 'show']);
Route::post('/sp', [SpInformaionContoller::class, 'store']);
Route::put('/sp/{id}', [SpInformaionContoller::class, 'update']);
// sp eventlog Route
Route::get('/sp/eventlog/sp/{id}', [SpEventLogController::class, 'index']);
Route::get('/sp/eventlog/{id}', [SpEventLogController::class, 'show']);
Route::post('/sp/eventlog', [SpEventLogController::class, 'store']);

####################################################################################################

// sp employee Route
Route::get('/spemployee', [SpEmployeeInformationController::class, 'index']);
Route::get('/spemployee/{id}', [SpEmployeeInformationController::class, 'show']);
Route::put('/spemployee/{id}', [SpEmployeeInformationController::class, 'update']);
Route::post('/spemployee', [SpEmployeeInformationController::class, 'store']);
// sp employee eventlog Route
Route::get('/spemployee/eventlog/spemployee/{id}', [SpEmployeeEventLogController::class, 'index']);
Route::get('/spemployee/eventlog/{id}', [SpEmployeeEventLogController::class, 'show']);
Route::post('/spemployee/eventlog', [SpEmployeeEventLogController::class, 'store']);


#####################################################################################################

//Admin Route

Route::get('/admin', [AdminInformationController::class, 'index']);
Route::get('/admin/{id}', [AdminInformationController::class, 'show']);
Route::post('/admin', [AdminInformationController::class, 'store']);
Route::put('/admin/{id}', [AdminInformationController::class, 'update']); 

// Admin event log Route

Route::get('/admin/eventlog/admin/{id}', [AdminEventLogController::class, 'index']);
Route::get('admin/eventlog/{id}', [AdminEventLogController::class, 'show']);
Route::post('admin/eventlog', [AdminEventLogController::class, 'store']);