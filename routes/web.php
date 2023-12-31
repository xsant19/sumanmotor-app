<?php

use App\Events\ServiceDeleted;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MontirController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
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

Route::get('/test', function () {
    return view('dashboard.components.pages.service.index-service');
})->name('halaman');


// Routing Landing Page
Route::get('/kontak-kami', [LandingPageController::class, 'kontak'])->name('kontak');
Route::get('/faq', [LandingPageController::class, 'faq'])->name('faq');
Route::get('/tentang-kami', [LandingPageController::class, 'tentangkami'])->name('tentang.kami');


// LOGIN SISTEM, LOGOUT SISTEM
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->name('auth')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// RESET DAN FORGOT PASSWORD
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password/reset', [AuthController::class, 'createForgotPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'UpdateResetPassword'])->middleware('guest')->name('password.update');


//REGISTER SISTEM
Route::get('/register', function () {
    return view('home.components.pages.register-home');
});
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::post('/orders/store', [OrderController::class, 'storeOrderAdmin'])->name('orders.store');
        // manggil nama route view wajib menambahkan admin.
    });

    //DASHBOARD SISTEM
    Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/dashboard-pelanggan', [DashboardController::class, 'pelanggan'])->name('dashboard.pelanggan');

    // CRUD USER
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/detail', [UserController::class, 'indexUser'])->name('user.index');
    Route::put('/user/{user}', [UserController::class, 'updateUser'])->name('user.update');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    //CRUD MONTIR
    Route::get('/montirs', [MontirController::class, 'index'])->name('montirs.index');
    Route::get('/montirs/create', [MontirController::class, 'create'])->name('montirs.create');
    Route::post('/montirs', [MontirController::class, 'store'])->name('montirs.store');
    Route::get('/montirs/{montir}/edit', [MontirController::class, 'edit'])->name('montirs.edit');
    Route::put('/montirs/{montir}', [MontirController::class, 'update'])->name('montirs.update');
    Route::delete('/montirs/{montir}', [MontirController::class, 'destroy'])->name('montirs.destroy');


    //CRUD ORDER

    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/user', [OrderController::class, 'createOrderByUser'])->name('orders.home');
    Route::get('/orders/user/motor/{id}', [OrderController::class, 'createOrderUserByMotor'])->name('orders.motor');
    Route::post('/orders/store/{id}', [OrderController::class, 'storeOrderUserByMotor'])->name('orders.user');
    Route::get('/orders/detail/{id}', [OrderController::class, 'detail'])->name('orders.detail');
    Route::post('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::post('/confirm-order/{id}', [OrderController::class, 'confirm'])->name('orders.confirm');
    Route::get('/progress-order/{id}', [OrderController::class, 'progress'])->name('orders.progress');
    Route::get('/close-order/{id}', [OrderController::class, 'close'])->name('orders.close');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

    //RIWAYAT Controller
    Route::get('/riwayats', [RiwayatController::class, 'index'])->name('riwayats.index');
    Route::get('/riwayats/{id}', [RiwayatController::class, 'view'])->name('riwayats.view');
    Route::get('/riwayats/user/{id}', [RiwayatController::class, 'viewUser'])->name('riwayats.view.user');
    Route::get('/export-order/{id}', [RiwayatController::class, 'exportPdf'])->name('orders.export');
    Route::get('/riwayat/user', [RiwayatController::class, 'indexUser'])->name('riwayats.indexUser');
    Route::delete('/riwayat/{order}', [RiwayatController::class, 'destroy'])->name('riwayats.destroy');


    //Export Controller
    Route::get('/cetak-laporan', [RiwayatController::class, 'export'])->name('cetak.laporan');

    //CRUD MOTOR
    Route::get('/motors', [MotorController::class, 'index'])->name('motors.index');
    Route::get('/motors/create', [MotorController::class, 'create'])->name('motors.create');
    Route::post('/motors', [MotorController::class, 'store'])->name('motors.store');
    Route::get('/motors/{motor}/edit', [MotorController::class, 'edit'])->name('motors.edit');
    Route::put('/motors/{motor}', [MotorController::class, 'update'])->name('motors.update');
    Route::get('/motors/user', [MotorController::class, 'viewMotorUser'])->name('motors.home');
    Route::delete('/motors/{motor}', [MotorController::class, 'destroy'])->name('motors.destroy');

    //CRUD SERVICE
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});
