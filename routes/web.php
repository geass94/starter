<?php

use Illuminate\Routing\Router;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');





Route::group([
    'middleware' => [ 'web' ]
], function (Router $router) {

    $router->get('/', function (){
        return view('welcome');
    });

    $router->group([
        'middleware' =>['auth:sanctum', 'verified'],
        'prefix' => '/admin'
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

        $router->resource('/roles', \App\Http\Controllers\Admin\RolesAndPermissionsController::class, [
            'names' => [
                'index' => 'admin.roles.index',
                'create' => 'admin.roles.create',
                'store' => 'admin.roles.store',
                'edit' => 'admin.roles.edit',
                'update' => 'admin.roles.update',
                'destroy' => 'admin.roles.delete'
            ]
        ]);
    });
});
