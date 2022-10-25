<?php

use App\Http\Controllers\Api\CampanhaController;
use App\Http\Controllers\Api\CidadesController;
use App\Http\Controllers\Api\GruposController;
use App\Http\Controllers\Api\ProdutosCampanhaController;
use App\Http\Controllers\Api\ProdutosController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('cidades',CidadesController::class)->only('index','store','update','destroy');
Route::resource('gruposcidade',GruposController::class)->only('index','store','update','destroy');
Route::resource('campanhas',CampanhaController::class)->only('index','store','update','destroy');
Route::resource('produtos',ProdutosController::class)->only('index','store','update','destroy');
Route::resource('produtoscampanhas',ProdutosCampanhaController::class)->only('index','store','update','destroy');