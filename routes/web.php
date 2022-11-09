<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\DoctorbookController;
use App\Http\Controllers\DoctorController;
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


Route::get('/',[DoctorbookController::class,'homePage'])->name('admin.login.view');


Route::get('admin/login',[adminController::class,'adminLoginView'])->name('admin.login.view');
Route::post('admin/login/desh',[adminController::class,'login'])->name('admin.loin');

Route::post('admin/register',[adminController::class,'adminRegister'])->name('admin.register');

//admin

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('admin/index',[adminController::class,'index'])->name('admin.index');
    Route::get('admin/logout',[adminController::class,'adminLogOut'])->name('admin.logout');
    Route::get('admin/doctor/list',[DoctorController::class,'doctorList'])->name('doctor.list');

});

//end admin

//doctor


Route::get('admin/doctor/available/time',[DoctorController::class,'doctorAvailableTimeSrc'])->name('doctors.available.time.src');

Route::post('admin/doctor/store',[DoctorController::class,'doctorStore'])->name('doctor.store');

Route::post('doctor/book',[DoctorController::class,'doctorBook'])->name('doctor.book');
Route::get('doctor/common/free/time',[DoctorController::class,'freeCommonTime'])->name('doctors.free.time');

//end doctor
