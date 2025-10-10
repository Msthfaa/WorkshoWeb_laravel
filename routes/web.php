<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalariesController;

// Route::resource('attendances', AttendanceController::class)->only(['index', 'create', 'store', 'show']);
Route::resource('employees', EmployeeController::class);
Route::resource('positions', PositionController::class);
Route::resource('departements', DepartementController::class);
Route::resource('attendances', AttendanceController::class)->only(['index', 'create', 'store', 'show']);
Route::resource('salaries', SalariesController::class)->only(['index', 'create', 'store', 'show']);
Route::get('/', function () {
    return redirect()->route('employees.index');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
