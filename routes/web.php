<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
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

Route::prefix('/')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});

Route::prefix('/employee')->group(function(){
    Route::get('/', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});