<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CriminalController;
use App\Http\Controllers\CriminalCaseController;

/*
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
*/




// IMAGE CONTROLLER

    
    // AUTHENTICATED USERS

    Route::controller(ImageController::class)->middleware('auth')->group(function(){
        
        // INDEX
        Route::get('/{model_slug}/{resource_slug}/images', 'adminImageIndex');

        // UPLOAD
        Route::put('/{model_slug}/{resource_slug}/images/upload', 'uploadImage');

        // CROP & SAVE
        Route::get('/{model_slug}/{resource_slug}/images/{image}/crop', 'cropImage');
        Route::post('/{model_slug}/{resource_slug}/images/{image}/render', 'renderImage');

        // UPDATE / SET AS MAIN
        Route::put('/{model_slug}/{resource_slug}/images/{image}/set-as-main', 'setMainImage');
        Route::put('/{model_slug}/{resource_slug}/images/{image}/update', 'updateDetails');

        // DELETE
        Route::get('/{model_slug}/{resource_slug}/images/{image}/delete', 'confirmDelete');
        Route::delete('/{model_slug}/{resource_slug}/images/{image}/destory', 'destroy');

    });




// SITE CONTROLLER 


    // ALL USERS

    Route::controller(SiteController::class)->group(function(){

        // SINGLE SERVE PAGES
        Route::get('/', 'viewHome');
        Route::get('/about-us', 'viewAboutUs');
        Route::get('/opportunities', 'viewOpportunities');
        Route::get('/privacy-policy', 'viewPrivacyPolicy');
        Route::get('/terms-of-use', 'viewTermsOfUse');

        // CONTACT FORM & SEND
        Route::get('/contact-us', 'viewContactUs');
        Route::post('/contact-us/send', 'sendContactMessage');

        // SEARCH RESULTS
        Route::post('grab-search-term', 'grabSearchTerm');
        Route::get('/search/{search_term}', 'searchResults');

    });




// CATEGORY CONTROLLER 


    // AUTHENTICATED USERS

    Route::controller(CategoryController::class)->middleware('auth')->group(function(){

        // CATEGORY INDEX
        Route::get('/admin/categories', 'adminIndex');

        // CRUD ROUTES
        Route::get('/categories/create', 'create');
        Route::post('/categories/store', 'store');
        Route::get('/categories/{category}/edit', 'edit');
        Route::put('/categories/{category}/update', 'update');
        Route::get('/categories/{category}/confirm-delete', 'confirmDelete');
        Route::delete('/categories/{category}/destroy', 'destroy');
    
    });


    // ALL USERS

    Route::controller(CategoryController::class)->group(function(){

        // INDEX & SHOW
        Route::get('/categories', 'index');
        Route::get('/categories/{category}', 'show');

    });




// CRIMINAL CASE CONTROLLER


    // AUTHENTICATED USERS
    
    Route::controller(CriminalCaseController::class)->middleware('auth')->group(function(){

        // CRIMINAL CASE INDEX
        Route::get('/admin/criminal-cases', 'adminIndex');

        // CRUD ROUTES
        Route::get('/criminal-cases/create', 'create');
        Route::post('/criminal-cases/store', 'store');
        Route::get('/criminal-cases/{criminal_case}/edit', 'edit');
        Route::put('/criminal-cases/{criminal_case}/update', 'update');
        Route::get('/criminal-cases/{criminal_case}/confirm-delete', 'confirmDelete');
        Route::delete('/criminal-cases/{criminal_case}/destroy', 'destroy');

    });


    // ALL USERS

    Route::controller(CriminalCaseController::class)->group(function(){
        
        // INDEX & SHOW
        Route::get('/criminal-cases', 'index');
        Route::get('/criminal-cases/{criminal_case}', 'show');

    });




// CRIMINAL CONTROLLER


    // AUTHENTICATED USERS
        
    Route::controller(CriminalController::class)->middleware('auth')->group(function(){
        
        // CRIMINAL INDEX
        Route::get('/admin/criminals', 'adminIndex');

        // CRUD ROUTES
        Route::get('/criminals/create', 'create');
        Route::post('/criminals/store', 'store');
        Route::get('/criminals/{criminal}/edit', 'edit');
        Route::put('/criminals/{criminal}/update', 'update');
        Route::get('/criminals/{criminal}/confirm-delete', 'confirmDelete');
        Route::delete('/criminals/{criminal}/destroy', 'destroy');

    });


    // ALL USERS

    Route::controller(CriminalController::class)->group(function(){
        
        // INDEX & SHOW
        Route::get('/criminals', 'index');
        Route::get('/criminals/{criminal}', 'show');

    });




// JUDGE CONTROLLER


    // AUTHENTICATED USERS
                
    Route::controller(JudgeController::class)->middleware('auth')->group(function(){
        
        // JUDGE INDEX
        Route::get('/admin/judges', 'adminIndex');

        // CRUD ROUTES
        Route::get('/judges/create', 'create');
        Route::post('/judges/store', 'store');
        Route::get('/judges/{judges}/edit', 'edit');
        Route::put('/judges/{judges}/update', 'update');
        Route::get('/judges/{judges}/confirm-delete', 'confirmDelete');
        Route::delete('/judges/{judges}/destroy', 'destroy');

    });


    // ALL USERS

    Route::controller(JudgeController::class)->group(function(){
        
        // INDEX & SHOW
        Route::get('/judges', 'index');
        Route::get('/judges/{judge}', 'show');

    });




// ARTICLE CONTROLLER


    // AUTHENTICATED USERS
                
    Route::controller(ArticleController::class)->middleware('auth')->group(function(){
        
        // ARTICLE INDEX
        Route::get('/admin/articles', 'adminIndex');

        // CRUD ROUTES
        Route::get('/articles/create', 'create');
        Route::post('/articles/store', 'store');
        Route::get('/articles/{article}/edit', 'edit');
        Route::put('/articles/{article}/update', 'update');
        Route::get('/articles/{article}/confirm-delete', 'confirmDelete');
        Route::delete('/articles/{article}/destroy', 'destroy');

    });


    // ALL USERS

    Route::controller(ArticleController::class)->group(function(){
        
        // INDEX & SHOW
        Route::get('/articles', 'index');
        Route::get('/articles/{article}', 'show');

    });




// USER CONTROLLER


    // AUTHENTICATED USERS

    Route::controller(UserController::class)->middleware('auth')->group(function(){
        
        // LOG OUT
        Route::post('/logout', 'logout');

    });


    // GUEST USERS

    Route::controller(UserController::class)->middleware('guest')->group(function(){

        // LOG IN
        Route::get('/login', 'viewLogin')->name('login');
        Route::post('/authenticate', 'authenticate');
        
    });




// ADMIN CONTROLLER 


    // AUTHENTICATED USERS

    Route::controller(AdminController::class)->middleware('auth')->group(function(){

        // INDEX
        Route::get('/admin', 'index');
        
        // CONFIG
        Route::get('/admin/config/edit', 'editConfig');
        Route::put('/admin/config/update', 'updateConfig');

        // DATABASE
        Route::get('/admin/databases', 'viewDatabases');
        Route::post('/admin/databases/clone', 'cloneDatabase');

        // ENVIRONMENT
        Route::get('/admin/environment/edit', 'editEnvironment');
        Route::put('/admin/environment/update', 'updateEnvironment');
            
    });