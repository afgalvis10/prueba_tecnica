<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\BodegasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\InventariosController;

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

Route::resource('usuarios', UsuariosController::class);
Route::resource('bodegas', BodegasController::class);
Route::resource('productos', ProductosController::class);

Route::post('/inventarios', ([InventariosController::class, 'store']));
Route::post('/inventarios/{id_bodega_origen}/{id_bodega_destino}/{id_producto}', ([InventariosController::class, 'update']));