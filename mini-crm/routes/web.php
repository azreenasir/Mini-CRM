<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){

    Route::get('company', [App\Http\Controllers\CompanyController::class,'index'])->name('companies.index');
    Route::get('company/create', [App\Http\Controllers\CompanyController::class,'create'])->name('companies.create');
    Route::post('company/store', [App\Http\Controllers\CompanyController::class,'store']);
    Route::get('company/{company:slug}', [App\Http\Controllers\CompanyController::class,'show'])->name('companies.show');
    Route::get('company/{company:slug}/edit', [App\Http\Controllers\CompanyController::class,'edit']);
    Route::patch('company/{company:slug}/edit', [App\Http\Controllers\CompanyController::class,'update']);
    Route::delete('company/{company:slug}/delete', [App\Http\Controllers\CompanyController::class,'destroy']);

    Route::get('employee', [App\Http\Controllers\EmployeeController::class,'index'])->name('employees.index');
    Route::get('employee/create', [App\Http\Controllers\EmployeeController::class,'create'])->name('employees.create');
    Route::post('employee/store', [App\Http\Controllers\EmployeeController::class,'store']);
    Route::get('employee/{employee:slug}', [App\Http\Controllers\EmployeeController::class,'show'])->name('employees.show');
    Route::get('employee/{employee:slug}/edit', [App\Http\Controllers\EmployeeController::class,'edit']);
    Route::patch('employee/{employee:slug}/edit', [App\Http\Controllers\EmployeeController::class,'update']);
    Route::delete('employee/{employee:slug}/delete', [App\Http\Controllers\EmployeeController::class,'destroy']);


});





