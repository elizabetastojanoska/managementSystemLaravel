<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;

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

Route::prefix('projects')->group(function() {
    Route::post('/', [ProjectController::class, 'store']);
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('/filter', [ProjectController::class, 'filterByDueDate']);
});

Route::prefix('categories')->group(function() {
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/', [CategoryController::class, 'index']);
});

Route::prefix('tasks')->group(function() {
    Route::post('/', [TaskController::class, 'store']);
    Route::get('/', [TaskController::class, 'index']);
    Route::patch('{id}/complete', [TaskController::class, 'markAsCompleted']);
});