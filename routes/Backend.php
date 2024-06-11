<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// this is the route for the dashboard which is protected by the auth middleware

Route::get('/Dashboard_Admin',[DashboardController::class, 'index'])->middleware(['auth:admin'])->name('dashboard.admin');



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']   
        /* 
            - SessionRedirect => Redirect the user to the correct locale based on the session locale
            [if i closed the dashboard in the arabic language and then i open it again it will open in the arabic language].
            - localizationRedirect => Redirect the user to the correct locale based on the browser locale.
            - localeViewPath => Set the locale view path to the current locale e.i.[resources/views/es/welcome.blade.php] incase of having view for each language.
        */
    ], function(){ 
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth'])->name('dashboard.user'); // using 'auth' in the middleware [laravel automatically get that this middleware is web middleware and it is defined in the RouteServiceProvider.php file in the boot method]
        
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');
        
        require __DIR__.'/auth.php';
    });


