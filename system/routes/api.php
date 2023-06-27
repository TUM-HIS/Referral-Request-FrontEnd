<?php

use App\Http\Controllers\api\ReferralTabController;
use App\Http\Controllers\MflController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/service_category/get_services', [MflController::class, 'getServiceFromCategory'])->name('services_from_service_category');
Route::get('/kmhfl/facility/facility_services', [MflController::class, 'getFacilityFromService'])->name('kmhfl.facility.facility_services');
Route::get('/kmhfl/token/generator', [MflController::class, 'tokenGenerator'])->name('kmhfl.token.generator');


//saving tab data
Route::post('/referral/save/tab1', [ReferralTabController::class, 'saveTab1Data']);
Route::post('/referral/save/tab2', [ReferralTabController::class, 'saveTab2Data']);


