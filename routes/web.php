<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\JuizController;
use App\Http\Controllers\ProcessoController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/',[HomeController::class, 'home'])->middleware("auth");


Route::group(['middleware' => ['role:Admin']], function(){
    Route::delete('/sessao/{id}', [SessaoController::class, 'destroy']);
    Route::delete('/juiz/{id}',[JuizController::class, 'destroy'])->middleware("auth");
    Route::delete('/processo/{id}',[ProcessoController::class, 'destroy'])->middleware("auth");
    Route::get('/sessao/view/document',[SessaoController::class, 'document'])->middleware("auth");
});


Route::group(['middleware' => ['role:Admin|Funcionario']], function(){
    //rotas da sessão controller
    Route::get('/sessao', [SessaoController::class, 'index']);
    Route::get('/sessao/create', [SessaoController::class, 'create']);
    //post para inserir dados
    Route::post('/sessao', [SessaoController::class, 'store']);
    Route::get('/sessao/{id}', [SessaoController::class, 'show']);
    Route::get('/sessao/{id}/edit', [SessaoController::class, 'edit']);
    //put para actualizar dados
    Route::put('/sessao/{id}/update', [SessaoController::class, 'update']);

    //rotas do juiz controller
    Route::get('/juiz',[JuizController::class, 'index'])->middleware("auth");
    Route::get('/juiz/create',[JuizController::class, 'create'])->middleware("auth");
    Route::post('/juiz',[JuizController::class, 'store'])->middleware("auth");
    Route::get('/juiz/{id}',[JuizController::class, 'show'])->middleware("auth");
    Route::get('/juiz/{id}/edit',[JuizController::class, 'edit'])->middleware("auth");
    Route::put('/juiz/{id}/update',[JuizController::class, 'update'])->middleware("auth");


    //rotas do processo controller
    Route::get('/processo',[ProcessoController::class, 'index'])->middleware("auth");
    Route::get('/processo/create',[ProcessoController::class, 'create'])->middleware("auth");
    Route::post('/processo',[ProcessoController::class, 'store'])->middleware("auth");
    Route::get('/processo/{id}',[ProcessoController::class, 'show'])->middleware("auth");
    Route::get('/processo/{id}/edit',[ProcessoController::class, 'edit'])->middleware("auth");
    Route::put('/processo/{id}/update',[ProcessoController::class, 'update'])->middleware("auth");

    Route::get('/processo/{id}/addfile',[ProcessoController::class, 'addfile'])->middleware("auth");
    Route::get('/documento',[DocumentoController::class, 'store']);

    Route::get('/sessao/view/document',[SessaoController::class, 'document'])->middleware("auth");
});











Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
