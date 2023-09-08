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
Route::middleware(['middleware' => 'api'])->put('/request_shifts/update/{request_shift_id}/{start_time}/{end_time}', [ShiftApiController::class, 'update_request_shift'])->name('api.update_request_shift');
