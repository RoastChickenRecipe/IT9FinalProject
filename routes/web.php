<?php

use App\Http\Controllers\BrgyController;
use App\Http\Controllers\ComplainantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HouseHoldController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MunController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\rqDocumentController;
use App\Http\Controllers\SubdController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'loginPage'])->name('showLogin');
Route::post('/', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'registerPage'])->name('register');
Route::post('/register/new', [LoginController::class, 'registerNew'])->name('registerNew');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::get('/Dashboard', [DashboardController::class, 'viewDashboard'])->name('dashView')->middleware(AuthCheck::class);
Route::get('/Household', [HouseHoldController::class, 'viewHouseHold'])->name('hholdView');

//For Navigation
Route::get('/dashboard/view', [NavController::class, 'viewDashboard'])->name('view.dashboard')->middleware(AuthCheck::class);
Route::get('/address/view', [NavController::class, 'viewAddress'])->name('view.address');
Route::get('/household/view', [NavController::class, 'viewHousehold'])->name('view.household');

//Resource for Dashboard
Route::resource('dashboard', DashboardController::class);

//Resoure For Address 
Route::resource('municipality', MunController::class);
Route::resource('barangay', BrgyController::class);
Route::resource('subdivision', SubdController::class);

// Functions for HouseHold
Route::resource('households', HouseHoldController::class);


Route::resource('rqDocuments', rqDocumentController::class);
Route::resource('complainants', ComplainantController::class);
//Route::resource('incidents', IncidentController::class);
Route::post('/incidents/file-incident', [IncidentController::class, 'create'])->name('incidents.create');
Route::post('/incidents/file-incident/store', [IncidentController::class, 'store'])->name('incidents.store');
Route::get('/incidents/{id}/edit', [IncidentController::class, 'edit'])->name('incidents.edit');
Route::put('/incidents/{id}', [IncidentController::class, 'update'])->name('incidents.update');
Route::delete('/incidents/{id}', [IncidentController::class, 'destroy'])->name('incidents.destroy');


/*
    Route::middleware(AuthCheck::class)->group(function(){
    
});

Request::get('<name>')
*/

