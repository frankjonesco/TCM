<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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
        
    });


