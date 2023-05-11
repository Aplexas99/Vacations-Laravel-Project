<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VacationRequestApproversController;
use App\Http\Controllers\VacationRequestController;
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

Route::get('/', function () {
    return view('welcome');
});

    Route::resource('employees', EmployeeController::class);

    Route::resource('roles', RoleController::class);

    Route::resource('teams', TeamController::class);

    Route::resource('projects', ProjectController::class);

    Route::resource('vacationRequests', VacationRequestController::class);

    Route::resource('vacationRequestApprovers', VacationRequestApproversController::class);