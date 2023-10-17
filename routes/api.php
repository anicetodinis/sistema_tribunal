<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SessaoController;

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


Route::get('/sessao', [SessaoController::class, 'index']);
Route::post('/sessao', [SessaoController::class, 'store']);
Route::get('/sessao/{id}', [SessaoController::class, 'show']);
Route::put('/sessao/{id}', [SessaoController::class, 'update']);
Route::delete('/sessao/{id}', [SessaoController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
