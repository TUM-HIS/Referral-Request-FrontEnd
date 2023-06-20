<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TriageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FacilityController;


Route::get('/', [UserController::class, 'signIn'])->name('user.signIn');
Route::post('/user-login', [UserController::class, 'login'])->name('user.login');
Route::get('/facility/set', [UserController::class, 'getFacilities'])->name('facility.set');
Route::post('/facility/select', [UserController::class, 'select'])->name('facility.select');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/admin', [UserController::class, 'admin'])->name('admin.dashboard');
Route::get('/doctor', [UserController::class, 'doctor'])->name('doctor.dashboard');
Route::get('/fhirJson', [ReferralController::class, 'fhirJson']);

Route::get('/patients-count', [UserController::class, 'getPatientsCount'])->name('patients.count');
Route::get('/physicians-count', [UserController::class, 'getPhysiciansCount'])->name('physicians.count');
Route::get('/referrals-count', [UserController::class, 'getReferralsCount'])->name('referrals.count');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');


    Route::get('/facilities', [ReferralController::class, 'facilities'])->name('referral.facilities');
    Route::get('/medicalTerms', [ReferralController::class, 'medicalTerms'])->name('referral.medicalTerms');


    //patient routes
    Route::get('/new-patient',[PatientController::class,'addPatient'])->name('patients.addPatient');
    Route::post('/store-patient', [PatientController::class, 'addData'])->name('patients.storeData');
    Route::get('/search-patient', [PatientController::class, 'searchPatient'])->name('patients.searchPatients');
    Route::get('/search-patients', [PatientController::class, 'search'])->name('patients.search-patient');
    // Route::get('/search-patient/results/', [PatientController::class, 'searchResults'])->name('patients.searchResults');
    Route::get('/patients/view/{patient}', [PatientController::class, 'viewPatient'])->name('patients.viewPatient');
    Route::get('/patients-count',[PatientController::class,'getPatientsCount']);



    //referral routes
    Route::get('/worklist',[ReferralController::class,'worklist'])->name('referrals.worklist');
    Route::post('/submit-referral', [ReferralController::class, 'submitReferral'])->name('referrals.submitReferral');
    //Route::get('/referral/{patient}', [ReferralController::class, 'create'])->name('referrals.create');
    Route::get('/referral/create/{patient}', [ReferralController::class, 'createreferal'])->name('referrals.createReferral');
    Route::get('/incoming-referrals/reviewed-requests', [ReferralController::class, 'reviewed'])->name('referrals.incoming.reviewed');
    Route::get('/incoming-referrals/counter-referrals', [ReferralController::class, 'counterReferral'])->name('referrals.incoming.counterreferral');
    Route::get('/referral/view/{referral}', [ReferralController::class, 'viewReferal'])->name('referrals.viewReferral');
    Route::get('/referral/view-incoming/{referral}', [ReferralController::class, 'viewIncomingReferal'])->name('referrals.viewIncomingReferral');
    Route::get('/referral-success}', [ReferralController::class, 'submitReferral'])->name('referrals.success');
    Route::delete('/referral/{id}', [ReferralController::class, 'destroy'])->name('referral.destroy');

    //Report routes
    Route::get('/reports/incoming-referrals-reports', [ReportController::class, 'incomingReports'])->name('reports.incoming-reports');
    Route::get('/reports/outgoing-referrals-reports', [ReportController::class, 'outgoingReports'])->name('reports.outgoing-reports');
    Route::get('/reports/completed-referrals-reports', [ReportController::class, 'completedReports'])->name('reports.completed-reports');

    //incoming referral
    Route::get('/incoming-referrals', [ReferralController::class, 'incomingReferrals'])->name('referrals.incoming');
    Route::get('/add-referral', [ReferralController::class, 'addReferral'])->name('referrals.addReferral');
    Route::get('/outgoing-referrals', [ReferralController::class, 'outgoing'])->name('referrals.outgoing');

    Route::post('/storeReferral', [ReferralController::class, 'storeReferral'])->name('referral.storeReferral');

    //outgoing referral
    Route::get('/outgoing', [ReferralController::class, 'outgoing'])->name('referral.outgoing');
    Route::get('/accept-referral-request/{referral}', [ReferralController::class, 'acceptReferralRequest'])->name('referral.accept');
    Route::get('/reject-referral-request/{referral}', [ReferralController::class, 'rejectReferralRequest'])->name('referral.reject');


    //triage routes
    Route::get('/triages', [TriageController::class, 'addTriage'])->name('triages.addTriage');
    Route::post('/store-form', [TriageController::class, 'store'])->name('triages.store-form');



    //admin routes
    Route::get('/admin/dashboard/charts', [AdminController::class, 'admin'])->name('admin.dashboard.charts');
    Route::get('/admin/test-charts', [AdminController::class, 'testCharts'])->name('admin.test-charts');
});


