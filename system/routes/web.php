<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TriageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'signIn'])->name('user.signIn');
Route::post('/user-login', [UserController::class, 'login'])->name('user.login');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/admin', [UserController::class, 'admin'])->name('admin.dashboard');
Route::get('/doctor', [UserController::class, 'doctor'])->name('doctor.dashboard');
Route::get('/fhirJson', [ReferralController::class, 'fhirJson']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

    Route::get('/referrals', [ReferralController::class, 'index'])->name('referrals.index');
    Route::get('/add-referral', [ReferralController::class, 'addReferral'])->name('referrals.addReferral');
    Route::get('/outgoing-referrals', [ReferralController::class, 'outgoingReferrals'])->name('referral.outgoing');

    Route::get('/patients',[PatientController::class,'addPatient'])->name('patients.addPatient');
    Route::post('/store-user', [PatientController::class, 'addData'])->name('patients.storeData');

    Route::get('/triages', [TriageController::class, 'addTriage'])->name('triages.addTriage');
    Route::post('/store-form', [TriageController::class, 'store'])->name('triages.store-form');
});


