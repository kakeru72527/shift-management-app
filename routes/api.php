<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShiftApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// // API
// Route::middleware(['middleware' => 'api'])->group(function() {
//     // 希望シフト作成
//     Route::post('/request_shifts/create', 'ShiftApiController@create_request_shift');
//     // 希望シフト表示
//     Route::get('/request_shifts', 'ShiftApiController@index_request_shift');
// });

Route::middleware(['middleware' => 'api'])->post('/request_shifts/create', [ShiftApiController::class, 'create_request_shift'])->name('api.create_request_shift');
Route::middleware(['middleware' => 'api'])->get('/request_shifts/get', [ShiftApiController::class, 'get_request_shift'])->name('api.get_request_shift');
Route::middleware(['middleware' => 'api'])->get('/confirm_shifts/get',[ShiftApiController::class, 'get_cnofirm_shift'])->name('api.get_confirm_shift');