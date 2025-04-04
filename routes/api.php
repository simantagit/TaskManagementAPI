<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    
});

Route::get('/tasks', [TasksController::class, 'tasks']);
Route::post('/tasks/add', [TasksController::class, 'add']);
Route::put('/tasks/{id}', [TasksController::class, 'update']);
Route::delete('/tasks/{id}', [TasksController::class, 'delete']);

