<?php

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

Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('companies', [\App\Http\Controllers\Api\ApiController::class, 'getCompany']);
    Route::get('clients/{company_id}', [\App\Http\Controllers\Api\ApiController::class, 'getClients']);
    Route::get('client_companies/{client_id}', [\App\Http\Controllers\Api\ApiController::class, 'getClientCompany']);


});
