<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;

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


Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
    Route::middleware('auth:sanctum')->post('/logout', 'logout');
});

Route::middleware('auth:sanctum')->controller(ResourceController::class)->group(function () {
    Route::get('/resources', 'fetchUserResources');
});

Route::prefix('/admin')->middleware(['auth:sanctum','user.admin'])->group(function () {
    Route::get('/resources', [AdminResourceController::class, 'fetchUserResources']);
    Route::get('/users', [UserController::class, 'fetchUsers']);
});