<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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