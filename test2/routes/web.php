<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/get/user/list', [App\Http\Controllers\UserController::class, 'getUserList'])->name('user.list');
Route::post('/get/individual/user/detail', [App\Http\Controllers\UserController::class, 'getUserDetails'])->name('user.details');
Route::post('/update/user/data', [App\Http\Controllers\UserController::class, 'updateUserData'])->name('user.update');
Route::delete('/delete/user/data/{user}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('user.delete');
Route::get('/manage-user',[App\Http\Controllers\ManageuserController::class, 'index'])->middleware('rolefunctional');
Route::get('/presensi', [App\Http\Controllers\PresensiController::class, 'index']);
Route::get('/presensi-hadir', [App\Http\Controllers\PresensiController::class, 'add']);
Route::get('/izin', [App\Http\Controllers\PerizinanController::class, 'index']);
Route::post('/izin-add', [App\Http\Controllers\PerizinanController::class, 'add']);
Route::get('/get/izin/list', [App\Http\Controllers\AttendancerecapController::class, 'getPermissionList'])->name('izin.list');
Route::get('/izin-approval', [App\Http\Controllers\AttendancerecapController::class, 'viewAttendanceApproval'])->middleware('rolestruktural');
Route::post('/update/izin/data/{id}', [App\Http\Controllers\AttendancerecapController::class, 'approveThis'])->name('izin.update');
Route::get('/rekap-presensi', [App\Http\Controllers\AttendancerecapController::class, 'index'])->middleware('rolestruktural');
Route::get('/get/presensi/list',[App\Http\Controllers\AttendancerecapController::class, 'getReport'])->name('presensi.list');
