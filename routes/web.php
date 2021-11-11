<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', [Backend\BackendController::class, 'index']);


Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('/index', [Backend\BackendController::class, 'index'])->name('index');
    Route::resource('employees', Backend\EmployeesController::class);
    Route::patch('/update_use/{id}',             [Backend\EmployeesController::class , 'update_user'])->name('user.update');
    Route::resource('reports', Backend\EmployeesReportController::class);
    Route::resource('jobs', Backend\PostionsController::class);

    Route::resource('statistics', Backend\StatisticsController::class);

 });


// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {


//     Route::group(['middleware' => 'myrole'], function () {

//         Route::get('/index', [Backend\BackendController::class, 'index'])->name('index');
//         Route::resource('employees', Backend\EmployeesController::class);

//     });


// });
