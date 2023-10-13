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

Route::group(['prefix' => 'company'], function () {
    #Delete a company
    Route::delete('/{id}', [App\Http\Controllers\Platform\Company\CompanyController::class, 'delete']);

    #Update a company
    Route::put('/{id}', [App\Http\Controllers\Platform\Company\CompanyController::class, 'update']);

    #Create a company
    Route::post('', [App\Http\Controllers\Platform\Company\CompanyController::class, 'create']);

    #Get company
    Route::get('/{id}', [App\Http\Controllers\Platform\Company\CompanyController::class, 'get']);
});

Route::group(['prefix' => 'companies'], function () {
    #Get all companies
    Route::get('', [App\Http\Controllers\Platform\Company\CompanyController::class, 'getAll']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
