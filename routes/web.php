<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\BookingController;
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

// Default route
Route::get('/', [BookingController::class, 'selectOfficeEmployee']);


// Employee
Route::get('/employee/all', [EmployeeController::class, 'showAll']);
Route::get('/employee/register', function () {
    return view('employee.register');
});
Route::post('/employee/register', [EmployeeController::class, 'register']);


//Office
Route::get('/office/all', [OfficeController::class, 'showAll']);
Route::get('/office/register', function () {
    return view('office.register');
});
Route::post('/office/register', [OfficeController::class, 'register']);


//Booking
Route::get('/booking/select-office-and-employee', [BookingController::class, 'selectOfficeEmployee']);
Route::post('/booking/select-timeslot', [BookingController::class, 'selectTimeslot']);
Route::post('/booking/reserve', [BookingController::class, 'reserve']);