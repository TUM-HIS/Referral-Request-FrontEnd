<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TriageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReferralController;

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
    Route::get('/facilities', [ReferralController::class, 'facilities'])->name('referral.facilities');
    Route::get('/medicalTerms', [ReferralController::class, 'medicalTerms'])->name('referral.medicalTerms');

    Route::post('/storeReferral', [ReferralController::class, 'storeReferral'])->name('referral.storeReferral');

    Route::get('/outgoing', [ReferralController::class, 'outgoing'])->name('referral.outgoing');

    Route::get('/new-patient',[PatientController::class,'addPatient'])->name('patients.addPatient');
    Route::post('/store-patient', [PatientController::class, 'addData'])->name('patients.storeData');

    Route::get('/search-patient', [PatientController::class, 'searchPatient'])->name('patients.searchPatients');
    Route::get('/search-patients', [PatientController::class, 'search'])->name('patients.search-patient');
    // Route::get('/search-patient/results/', [PatientController::class, 'searchResults'])->name('patients.searchResults');
    Route::get('/patients/view/{patient}', [PatientController::class, 'viewPatient'])->name('patients.viewPatient');

    // Route::get('/search-doctor', [DoctorController::class, 'searchDoctor'])->name('doctors.searchDoctor');
    // Route::get('/view-pdoctor', [DoctorController::class, 'viewDoctor'])->name('doctors.viewDoctor');

    Route::get('/triages', [TriageController::class, 'addTriage'])->name('triages.addTriage');
    Route::post('/store-form', [TriageController::class, 'store'])->name('triages.store-form');
    Route::get('/worklist',[ReferralController::class,'worklist'])->name('referrals.worklist');
    Route::post('/submit-referral', [ReferralController::class, 'submitReferral'])->name('referrals.submitReferral');
    //Route::get('/referral/{patient}', [ReferralController::class, 'create'])->name('referrals.create');
    Route::get('/referral/create/{patient}', [ReferralController::class, 'createreferal'])->name('referrals.createreferal');
    Route::get('/referral-success}', [ReferralController::class, 'submitReferral'])->name('referrals.success');
});


