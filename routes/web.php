<?php

use App\Http\Controllers\BrgyController;
use App\Http\Controllers\BusPermitController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\ComplainantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HouseHoldController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MunController;
use App\Http\Controllers\rqDocumentController;
use App\Http\Controllers\SubdController;
use App\Http\Middleware\AuthCheck;
use App\Models\BusPermitModel;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'set'])->name('setLogin');
Route::get('/login', [LoginController::class, 'loginPage'])->name('showLogin');
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(AuthCheck::class)->group(function(){
    //Resource
    Route::resource('dashboard', DashboardController::class); // Dashboard

    Route::resource('municipality', MunController::class); // Address
    Route::resource('barangay', BrgyController::class);
    Route::resource('subdivision', SubdController::class);

    Route::resource('households', HouseHoldController::class); // Household
    Route::resource('citizens', CitizenController::class);

    Route::resource('rqDocuments', rqDocumentController::class); // Request Doc

    Route::resource('business-permits', BusPermitController::class);
    Route::post('business-permits/export', [BusPermitController::class, 'exportBusPermit'])->name('business-permits.export');

    Route::resource('complainants', ComplainantController::class); // incidents
    Route::post('complainants/export', [ComplainantController::class, 'exportcomplainants'])->name('complainants.export');
    //Route::post('complainants/export-pdf', [ComplainantController::class, 'getPdf'])->name('complainants.export-pdf');

    Route::resource('incidents', IncidentController::class);
    Route::post('incidents/export', [IncidentController::class, 'exportIncident'])->name('incidents.export');
});

/*
Route::get('/register', [LoginController::class, 'registerPage'])->name('register');
Route::post('/register/new', [LoginController::class, 'registerNew'])->name('registerNew');

*/
