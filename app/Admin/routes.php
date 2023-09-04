<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\StoreController;
use App\Admin\Controllers\StaffController;
use App\Admin\Controllers\UserController;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('stores', StoreController::class);
    $router->resource('staff', StaffController::class);
    $router->resource('users', UserController::class);

});

