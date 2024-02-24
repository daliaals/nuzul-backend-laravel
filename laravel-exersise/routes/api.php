<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('properties', [PropertyController::class, 'index']);
Route::post('properties', [PropertyController::class, 'store']);
Route::get('properties/{id}', [PropertyController::class, 'show']);
Route::get('properties/{id}/edit', [PropertyController::class, 'edit']);
Route::put('properties/{id}/edit', [PropertyController::class, 'update']);
Route::delete('properties/{id}/delete', [PropertyController::class, 'destroy']);