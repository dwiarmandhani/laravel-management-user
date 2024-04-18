<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::middleware('auth:api')->group(function () {
    Route::post('/users/create', [App\Http\Controllers\Api\UserController::class, 'create']);
    Route::get('/users', [App\Http\Controllers\Api\UserController::class, 'index']);
    Route::post('/users/change-password', [App\Http\Controllers\Api\UserController::class, 'changePassword']);
    Route::delete('/users/{id}', [App\Http\Controllers\Api\UserController::class, 'delete']);
    Route::put('/users/{id}', [App\Http\Controllers\Api\UserController::class, 'update']);
});
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
