<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\TripController;
use App\Http\Livewire\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/guest/trip/new', \App\Http\Livewire\TripForm::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'redirect.admin',
])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/trip/{trip}', TripController::class)->name('trip');
    Route::get('/trip/new', TripController::class)->name('trip');
    Route::get('/profile/{user}', UserController::class)->name('profile');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'auth.admin'
])->group(function () {
    Route::get('/admin/trip', [\App\Http\Controllers\TripController::class, 'index'])->name('admin.trips');
    Route::get('/admin/trip/{trip}', TripController::class)->name('admin.trip.view');
    Route::get('/admin/incidentreport', [\App\Http\Controllers\IncidentReportController::class, 'index'])->name('admin.incidentreports');
    Route::get('/admin/profile', [\App\Http\Controllers\UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/profile/create', [\App\Http\Controllers\UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/profile/create', [\App\Http\Controllers\UserController::class, 'create'])->name('admin.user.create');
    Route::get('/admin/profile/{user}', UserController::class)->name('admin.user');
});

