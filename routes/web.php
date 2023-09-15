<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FormController;

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
Route::get('/staff',[App\Http\Controllers\StaffController::class, 'index'])->middleware('auth')->name('staff.index');
Route::delete('/staff/{staff}',[App\Http\Controllers\StaffController::class, 'destroy'])->middleware('auth')->name('staff.destroy');

Route::get('/request_shift/{store}', [App\Http\Controllers\StoreController::class, 'show'])->middleware('auth')->name('request_shift.show');
Route::get('/confirm_shift/{store}', [App\Http\Controllers\StoreController::class, 'confirm_show'])->middleware('auth')->name('confirm_shift.show');

// 管理者ページ
Route::get('/store_for_admin/{store}', [App\Http\Controllers\StoreController::class, 'show_for_admin'])->middleware('auth')->name('store.show_for_admin');

// スタッフ編集
Route::get('/edit_staff/{store}',[App\Http\Controllers\StaffController::class, 'edit_staff'])->middleware('auth')->name('staff.edit_for_admin');
Route::post('/store_staff/{store}',[App\Http\Controllers\StaffController::class, 'store'])->middleware('auth')->name('staff.store');
Route::delete('/staff/admin/{staff}',[App\Http\Controllers\StaffController::class, 'destroy_for_admin'])->middleware('auth')->name('staff.destroy_for_admin');


// お問い合わせフォーム

Route::get('/form', [App\Http\Controllers\FormController::class, 'index'])->middleware('auth')->name('form');
Route::get('/form/complete', [FormController::class, 'complete'])->middleware('auth')->name('form.complete');
Route::post('/form', [FormController::class, 'sendMail'])->middleware('auth');


