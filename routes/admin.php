<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;

Route::group(['middleware' => [ 'web' ] ], function (Router $router) {
    $router->group([
        'middleware' =>['auth:sanctum', 'verified'],
    ], function (Router $router) {

        $router->get('/dashboard', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.dashboard');

        $router->resource('/users', \App\Http\Controllers\Admin\UserController::class, [
            'names' => [
                'index' => 'admin.users.index',
                'create' => 'admin.users.create',
                'store' => 'admin.users.store',
                'edit' => 'admin.users.edit',
                'update' => 'admin.users.update',
                'destroy' => 'admin.users.delete'
            ]
        ]);
    });
});
