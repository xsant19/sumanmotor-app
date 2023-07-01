<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.components.pages.index-home');
});

Route::get('/login', function () {
    return view('home.components.pages.login-home');
});

Route::get('/register', function () {
    return view('home.components.pages.register-home');
});

Route::get('/dashboard-admin', [DashboardController::class, 'index']);
