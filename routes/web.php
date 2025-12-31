<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ValidateUniqueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'verified'])->prefix('hrm')->group(function () {
    Route::resource('departments', DepartmentController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('employees', EmployeeController::class);

    Route::get('/validate/unique',[ValidateUniqueController::class, 'validateUnique'])->name('validate.unique');
});