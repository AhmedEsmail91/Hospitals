<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/Dashboard_Admin',[DashboardController::class, 'index']);


Route::get('/dashboard/user', function () {
    return view('Dashboard.User.dashboard');
})->middleware(['auth'])->name('dashboard.user'); // using 'auth' in the middleware [laravel automatically get that this middleware is web middleware and it is defined in the RouteServiceProvider.php file in the boot method]

Route::get('/dashboard/admin', function () {
    return view('Dashboard.Admin.dashboard');
})->middleware(['auth:admin'])->name('dashboard.admin');

require __DIR__.'/auth.php';