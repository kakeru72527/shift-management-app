<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StoreController;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('staff', StaffController::class);
Route::get('/staff',[App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
Route::delete('/staff/{staff}',[App\Http\Controllers\StaffController::class, 'destroy'])->name('staff.destroy');

Route::get('/store/{store}', [App\Http\Controllers\StoreController::class, 'show'])->name('store.show');

// 管理者ページ
Route::get('/store_for_addmin/{store}', [App\Http\Controllers\StoreController::class, 'show_for_addmin'])->name('store.show_for_addmin');

// スタッフ編集
Route::get('/edit_staff/{store}',[App\Http\Controllers\StaffController::class, 'edit_staff'])->name('staff.edit_for_addmin');
Route::post('/store_staff/{store}',[App\Http\Controllers\StaffController::class, 'store'])->name('staff.store');
Route::delete('/staff/addmin/{staff}',[App\Http\Controllers\StaffController::class, 'destroy_for_addmin'])->name('staff.destroy_for_addmin');






