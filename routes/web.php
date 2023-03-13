<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\UnidadeController;

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
    return view('home');
});

Route::get('/funcionarios/criar', [FuncionarioController::class, 'create']);

Route::get('/funcionarios/{id}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update']);
Route::delete('/funcionarios/{id}/delete', [FuncionarioController::class, 'delete'])->name('funcionarios.delete');

Route::get('/funcionarios/search', [FuncionarioController::class, 'search']);


Route::get('/funcionarios', [FuncionarioController::class, 'index']);
Route::post('/funcionarios', [FuncionarioController::class, 'store']);


Route::get('/unidades/criar', [UnidadeController::class, 'create']);
Route::get('/unidades', [UnidadeController::class, 'index']);
Route::post('/unidades', [UnidadeController::class, 'store']);

Route::get('/unidades/{id}/edit', [UnidadeController::class, 'edit'])->name('unidades.edit');
Route::put('/unidades/{id}', [UnidadeController::class, 'update']);
Route::delete('/unidades/{id}/delete', [UnidadeController::class, 'delete'])->name('unidades.delete');
Route::get('/unidades/search', [UnidadeController::class, 'search']);


Route::get('/validar-email/{email}', [FuncionarioController::class, 'validarEmail']);
