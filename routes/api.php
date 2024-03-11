<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::post('/user/register', [AuthController::class, 'register']);
    Route::post('/user/createToken', [AuthController::class, 'createToken']);

    Route::middleware('auth:sanctum')->prefix('user')->group(function () {
        Route::resource('tasks', TasksController::class);
        Route::get('tokens', function () {
            return request()->user()->tokens;
        });
    });
});
