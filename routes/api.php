<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/posts/roleId/{roleId}/userId/{userId}', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::delete('post/{id}', [PostController::class, 'destroy']);
    Route::patch('/approvePost/{id}', [PostController::class, 'approvePost']);
    Route::patch('/rejectPost/{id}', [PostController::class, 'rejectPost']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


