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
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HolidayNotificationController;

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

Route::put('/profile', 'ProfileController@update')->name('profile.update');
Route::get('/tasks', [TasksController::class, 'index'])->name('tasks');
Route::post('/tasks', [TasksController::class, 'store'])->name('taskstore');
Route::put('/payment', 'ProfileController@payment')->name('payment.update');
Route::put('/additionalTem', 'ProfileController@additionalTem')->name('additional.temp');
Route::put('/additionalPer', 'ProfileController@additionalPer')->name('additional.per');
Route::put('/emergency', 'ProfileController@emergency')->name('emergency.update');


// Route::get('/additionalTem', 'ProfileController@additionalTempAdd')->name('additional.add');

Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/about', [AdminController::class, 'index'])->name('about');
// Route::get('/about', [AdminController::class, 'leave'])->name('aboutleave');
// Route::get('/about', [AdminController::class, 'leave'])->name('about-leave');
// Route::get('/about', [AdminController::class, ''])->name('about');



// Route::get('/about', [LeaveAdminController::class, 'index'])->name('about');

Route::get('/users/{id}', 'UsersController@show')->name('users.show'); 
Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');
Route::post('/users/{id}/update', 'UsersController@update')->name('users.update');
// Route::get('/holiday-notification', [HolidayNotificationController::class, 'index'])->name('store.holiday');


// for punchin and punchout
// Route::get('/punch', [PunchInController::class, 'index'])->name('punch');
Route::get('/punch-in', 'PunchInController@index')->name('punch');


Route::post('/punch-in', 'PunchInController@punchIn')->name('punch.in');
Route::post('/punch-out', 'PunchInController@punchOut')->name('punch.out'); //using string syntax

Route::get('/leave', [LeaveController::class, 'index'])->name('leave');// using array syntax
Route::post('/leave', [LeaveController::class, 'apply'])->name('leave.apply');


// Route::post('/leave-admin', [LeaveController::class, 'apply'])->name('leave-admin.apply');

Route::post('/leave-admin/approve/{id}', [LeaveAdminController::class, 'approve'])->name('leave-admin-approve');
Route::post('/leave-admin/reject/{id}', [LeaveAdminController::class, 'reject'])->name('leave-admin-reject');


Route::get('/activity-log','ActivityController@index')->name('activity.log');
Route::get('/activity-log-admin','ActivityAdminController@index')->name('activity.log.admin');

Route::get('/activity-log/{username}', 'ActivityController@showProfile')->name('user.profile');
// Route::get('/user/{username}/profile', 'UserProfileController@show')->name('user.profile');

Route::post('/profile','ProfileController@store')->name('profile.store');



