<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MontirController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



// Routing Untuk Halaman Landing Page Belum Dinamis
Route::get('/', function () {
    return view('home.components.pages.index-home');
})->name('halaman.utama');

Route::get('/kontak-kami', function () {
    return view('home.components.pages.kontakkami-home');
})->name('kontak.utama');

Route::get('/faq', function () {
    return view('home.components.pages.faq-home');
})->name('faq.utama');

Route::get('/tentang-kami', function () {
    return view('home.components.pages.tentangkami-home');
})->name('tentangkami.utama');


// Route::get('/login', function () {
//     return view('home.components.pages.login-home');
// })->name('login.utama');

Route::get('/register', function () {
    return view('home.components.pages.register-home');
});

// LOGIN SISTEM
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->name('auth')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');



// CRUD USER


// CRUD MOTOR

// CRUD SERVICE


Route::middleware(['auth'])->group(function () {
    //DASHBOARD SISTEM
    Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/dashboard-pelanggan', [DashboardController::class, 'pelanggan'])->name('dashboard.pelanggan');

    //LOGIN,LOGOUT DAN REGISTER

    //CRUD MONTIR
    Route::get('/montirs', [MontirController::class, 'index'])->name('montirs.index');
    Route::get('/montirs/create', [MontirController::class, 'create'])->name('montirs.create');
    Route::post('/montirs', [MontirController::class, 'store'])->name('montirs.store');
    Route::get('/montirs/{montir}/edit', [MontirController::class, 'edit'])->name('montirs.edit');
    Route::put('/montirs/{montir}', [MontirController::class, 'update'])->name('montirs.update');
    Route::delete('/montirs/{montir}', [MontirController::class, 'destroy'])->name('montirs.destroy');

    //CRUD MONTIR
    Route::get('/montirs', [MontirController::class, 'index'])->name('montirs.index');
    Route::get('/montirs/create', [MontirController::class, 'create'])->name('montirs.create');
    Route::post('/montirs', [MontirController::class, 'store'])->name('montirs.store');
    Route::get('/montirs/{montir}/edit', [MontirController::class, 'edit'])->name('montirs.edit');
    Route::put('/montirs/{montir}', [MontirController::class, 'update'])->name('montirs.update');
    Route::delete('/montirs/{montir}', [MontirController::class, 'destroy'])->name('montirs.destroy');
});
