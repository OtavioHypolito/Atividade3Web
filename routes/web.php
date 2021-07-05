<?php

use App\Http\Controllers\PosicaoController;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\JogadorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::Resources([
    "posicao" => PosicaoController::class
]);

Route::Resources([
    "clube" => ClubeController::class
]);

Route::Resources([
    "jogador" => JogadorController::class
]);