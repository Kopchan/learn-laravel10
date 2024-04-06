<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route
::controller(AuthController::class)
->group(function ($auth) {
    $auth->get ('/signup', 'signup');
    $auth->post('/login' , 'login');
    $auth->middleware('auth:api')->post('/logout', 'logout');
});

Route
::controller(UserController::class)
->prefix('users')
->group(function ($users) {
    $users->post  (''    , 'create');
    $users->get   (''    , 'showAll');
    $users->get   ('{id}', 'show');
    $users->patch ('{id}', 'update');
    $users->delete('{id}', 'delete');
});

Route
::controller(RoleController::class)
->prefix('roles')
->group(function ($users) {
    $users->post  (''    , 'create');
    $users->get   (''    , 'showAll');
    $users->get   ('{id}', 'show');
    $users->patch ('{id}', 'update');
    $users->delete('{id}', 'delete');
});

Route
::controller(ProductController::class)
->prefix('products')
->group(function ($users) {
    $users->post  (''    , 'create');
    $users->get   (''    , 'showAll');
    $users->get   ('{id}', 'show');
    $users->patch ('{id}', 'update');
    $users->delete('{id}', 'delete');
});

Route
::controller(CategoryController::class)
->prefix('categories')
->group(function ($users) {
    $users->post  (''    , 'create');
    $users->get   (''    , 'showAll');
    $users->get   ('{id}', 'show');
    $users->patch ('{id}', 'update');
    $users->delete('{id}', 'delete');
});
