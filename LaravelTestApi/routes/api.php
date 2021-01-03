<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\v1\AccountController;
use App\Http\Controllers\v1\TransactionController;

use App\Http\Controllers\AuthController;

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
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);
Route::middleware('auth:api')->post('refresh', [AuthController::class, 'refresh']);
Route::middleware('auth:api')->post('me', [AuthController::class, 'me']);

Route::get('v1/accounts', [AccountController::class, 'index']);
Route::post('v1/accounts', [AccountController::class, 'store']);
Route::get('v1/accounts/{id}', [AccountController::class, 'show']);

Route::get('v1/transactions', [TransactionController::class, 'index']);
Route::post('v1/transactions', [TransactionController::class, 'store']);
Route::get('v1/transactions/{id}', [TransactionController::class, 'show']);
