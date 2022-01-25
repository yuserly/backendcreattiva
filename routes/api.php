<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\PrecioDominiosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SubcategoriasController;
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

Route::get('getcategorias',[CategoriasController::class,'show']);
Route::get('getsubcategorias/{id}',[SubcategoriasController::class,'show']);
Route::get('getproductos/{id}',[ProductosController::class,'show']);
Route::get('dominios/{dominio}/{extension}',[PrecioDominiosController::class,'dominios']);
Route::get('preciodominios',[PrecioDominiosController::class,'preciodominios']);

