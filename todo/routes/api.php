<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TodoController;

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

Route::get('/index', [TodoController::class, 'index']);

Route::post('/add', [TodoController::class, 'add']);

Route::delete('/remove', [TodoController::class, 'remove']);

Route::post('/removeAll', [TodoController::class, 'removeAll']);

Route::post('/doneAll', [TodoController::class, 'doneAll']);
