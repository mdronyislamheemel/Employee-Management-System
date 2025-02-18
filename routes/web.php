<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/{id}/show', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('/employee/search', [EmployeeController::class, 'search'])->name('employee.search');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.crete');
Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/{id}/update', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employee/{id}/update', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{id}/delete', [EmployeeController::class, 'destroy'])->name('employee.destroy');