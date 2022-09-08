<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

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

Route::get('/show-employees-attendance',[AttendanceController::class, 'showAttendanceDetails'])->name('show.employees.attendance');

Route::get('/show-duplicate-eliments',[AttendanceController::class, 'printDuplicateEliments'])->name('show.duplicate.eliments');


Route::get('/', function () {
    return view('welcome');
});
