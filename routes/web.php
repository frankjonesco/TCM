<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CriminalCaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
|
--------------------------------------------------------------------------
| Key Definitions
|--------------------------------------------------------------------------
|
|   INDEX       List records
|   VIEW........View single page
|   SHOW........Show single record
|   CREATE......Show form for creating a record
|   STORE.......Save record to the database
|   EDIT........Show form to edit record
|   UPDATE......Save updated record to database
|   DESTROY.....Delete record from database
|
|--------------------------------------------------------------------------
|
**************************************************************************/




// SITE CONTROLLER 


// ALL USERS

Route::controller(SiteController::class)->group(function(){

    Route::get('/', 'viewHome');
    Route::get('/about-us', 'viewAbout');
    Route::get('/contact-us', 'viewContactUs');
    Route::get('/opportunities', 'viewOpportunities');
    Route::get('/privacy-policy', 'viewPrivacyPolicy');
    Route::get('/terms-of-use', 'viewTermsOfUse');

});




// CATEGORY CONTROLLER 


    // AUTHENTICATED USERS

    Route::controller(CategoryController::class)->middleware('auth')->group(function(){

        Route::get('/admin/categories', 'adminIndex');
        Route::get('/categories/create', 'create');
        Route::post('/categories/store', 'store');
        Route::get('/categories/{category}/edit', 'edit');
        Route::put('/categories/{category}/update', 'update');
        Route::get('/categories/{category}/confirm-delete', 'confirmDelete');
        Route::delete('/categories/{category}/destroy', 'destroy');
    

    });


    // ALL USERS

    Route::controller(CategoryController::class)->group(function(){

        Route::get('/categories', 'index');
        Route::get('/categories/{category}', 'show');

    });




// CRIMINAL CASE CONTROLLER


    // AUTHENTICATED USERS
    
    Route::controller(CriminalCaseController::class)->middleware('auth')->group(function(){
        
        Route::get('/admin/criminal-cases', 'adminIndex');
        Route::get('/criminal-cases/create', 'create');
        Route::post('/criminal-cases/store', 'store');
        Route::get('/criminal-cases/{criminal_case}/edit', 'edit');
        Route::put('/criminal-cases/{criminal_case}/update', 'update');
        Route::get('/criminal-cases/{criminal_case}/confirm-delete', 'confirmDelete');
        Route::delete('/criminal-cases/{criminal_case}/destroy', 'destroy');

    });


    // ALL USERS

    Route::controller(CriminalCaseController::class)->group(function(){
        
        Route::get('/criminal-cases', 'index');
        Route::get('/criminal-cases/{criminal_case}', 'show');

    });




// USER CONTROLLER


    // AUTHENTICATED USERS

    Route::controller(UserController::class)->middleware('auth')->group(function(){
            
        Route::post('/logout', 'logout');

    });


    // GUEST USERS

    Route::controller(UserController::class)->middleware('guest')->group(function(){

        Route::get('/login', 'viewLogin')->name('login');
        Route::post('/authenticate', 'authenticate');
        
    });