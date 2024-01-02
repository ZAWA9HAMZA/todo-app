<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
 

Route::get("/",[TasksController::class, "index"]);

Route::get('/tasks', [TasksController::class, "index"]);

Route::get('/tasks/create', [TasksController::class, "create"]);

Route::post('/tasks', [TasksController::class, "store"]);

Route::patch('/tasks/{id}', [TasksController::class, "update"]);

Route::delete('/tasks/{id}', [TasksController::class, "delete"]);

