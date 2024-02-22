<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PunchController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveAdminController;





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
    
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');
Route::post('/tasks', [TasksController::class, 'store'])->name('taskstore');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
Route::put('/payment', 'ProfileController@payment')->name('payment.update');
Route::put('/additionalTem', 'ProfileController@additionalTem')->name('additional.temp');
Route::put('/additionalPer', 'ProfileController@additionalPer')->name('additional.per');
Route::put('/emergency', 'ProfileController@emergency')->name('emergency.update');


Route::get('/punch', [PunchController::class, 'index'])->name('punch');
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/about', [AdminController::class, 'index'])->name('about');

Route::get('/users/{id}', 'UsersController@show')->name('users.show'); // Replace UserController@show with your actual controller and method
Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit'); // Replace UserController@edit with your actual controller and method



// for punchin and punchout
Route::post('/punch-in', 'PunchInController@punchIn')->name('punch.in');
Route::post('/punch-out', 'PunchInController@punchOut')->name('punch.out'); //using string syntax

Route::get('/leave', [LeaveController::class, 'index'])->name('leave');// using array syntax
Route::post('/leave', [LeaveController::class, 'apply'])->name('leave.apply');

Route::get('/leave-admin', [LeaveAdminController::class, 'index'])->name('leave-admin');
// Route::post('/leave-admin', [LeaveController::class, 'apply'])->name('leave-admin.apply');

Route::post('/leave-admin/approve/{id}', [LeaveAdminController::class, 'approve'])->name('leave-admin-approve');
Route::post('/leave-admin/reject/{id}', [LeaveAdminController::class, 'reject'])->name('leave-admin-reject');

