<?php

use App\Http\Controllers\BrgyController;
use App\Http\Controllers\CitizenController;
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

Route::get('/', [LoginController::class, 'set'])->name('setLogin');
Route::get('/login', [LoginController::class, 'loginPage'])->name('showLogin');

Route::post('/', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'registerPage'])->name('register');
Route::post('/register/new', [LoginController::class, 'registerNew'])->name('registerNew');
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

    Route::resource('complainants', ComplainantController::class); // incidents
    Route::post('complainants/export', [ComplainantController::class, 'exportcomplainants'])->name('complainants.export');

    Route::resource('incidents', IncidentController::class);
    Route::delete('incidents/{id}/all', [IncidentController::class, 'destroyAll'])->name('incidents.destroyAll');
});

/*
//Resource
Route::resource('dashboard', DashboardController::class)->middleware(AuthCheck::class); // Dashboard

Route::resource('municipality', MunController::class); // Address
Route::resource('barangay', BrgyController::class);
Route::resource('subdivision', SubdController::class);

Route::resource('households', HouseHoldController::class); // Household
Route::resource('citizens', CitizenController::class);

Route::resource('rqDocuments', rqDocumentController::class); // Request Doc

Route::resource('complainants', ComplainantController::class); // incidents
Route::post('complainants/export', [ComplainantController::class, 'exportcomplainants'])->name('complainants.export');

Route::resource('incidents', IncidentController::class);
Route::delete('incidents/{id}/all', [IncidentController::class, 'destroyAll'])->name('incidents.destroyAll');
*/



// Functions for Citizens
//Route::get('/citizens/{id}/add', [CitizenController::class, 'create'])->name('citizens.create');

/*
Route::post('/incidents/file-incident', [IncidentController::class, 'create'])->name('incidents.create');
Route::post('/incidents/file-incident/store', [IncidentController::class, 'store'])->name('incidents.store');
Route::get('/incidents/{id}/edit', [IncidentController::class, 'edit'])->name('incidents.edit');
Route::put('/incidents/{id}', [IncidentController::class, 'update'])->name('incidents.update');
Route::delete('/incidents/{id}', [IncidentController::class, 'destroy'])->name('incidents.destroy');
*/



/*
    Route::middleware(AuthCheck::class)->group(function(){
    
});

Request::get('<name>')
*/

