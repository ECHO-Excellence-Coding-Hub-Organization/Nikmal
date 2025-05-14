<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:Super Admin|Admin'])->name('dashboard');

Route::resource('customers', CustomerController::class)->middleware(['auth', 'verified', 'role:Super Admin|Admin']);
Route::resource('vehicles', VehicleController::class)->middleware(['auth', 'verified', 'role:Super Admin|Admin']);

Route::resource('rentals', RentalController::class)->middleware(['auth', 'verified', 'role:Super Admin|Admin']);
Route::resource('customers.rentals', RentalController::class)->middleware(['auth', 'verified', 'role:Super Admin|Admin']);
Route::resource('customers.vehicles.rentals', RentalController::class)->middleware(['auth', 'verified', 'role:Super Admin|Admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('/costemer/{customer}/vehicles/{vehicle}/rentals/{rental}/status', [RentalController::class, 'status'])->name('vehicle_rentals.status')->middleware(['auth', 'verified', 'role:Super Admin|Admin']);

require __DIR__ . '/auth.php';
