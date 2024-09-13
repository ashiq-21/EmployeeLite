<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');//Show all employees list

Route::prefix('employees')->group(function () {
    Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create'); // Show create employee form

    Route::post('/', [EmployeeController::class, 'store'])->name('employees.store'); // Store a new employee

    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit'); // Show edit form

    Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employees.update'); // Update an employee

    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy'); // Delete an employee
});

