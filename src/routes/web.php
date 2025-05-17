<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [WeightLogController::class, 'index']);
    Route::get('/weight_logs/{weightLogId}', [WeightLogController::class, 'edit']);
    Route::post('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'update']);
    Route::post('/weight_logs/{weightLogId}/delete', [WeightLogController::class, 'delete']);
    Route::get('/todos/search', [WeightLogController::class, 'search']);
    Route::get('/add', [WeightLogController::class, 'add']);
    Route::post('/add', [WeightLogController::class, 'create']);
    Route::get('/wight_logs/goal_setting', [WeightLogController::class, 'weighttarget']);
    Route::post('/wight_logs/goal_setting', [WeightLogController::class, 'weighttargetupdate']);
});

Route::post('/register', [RegisterController::class, 'store']);
Route::get('/register/step2', [RegisterController::class, 'index']);
Route::post('/register/step2', [WeightLogController::class, 'weightregister']);
