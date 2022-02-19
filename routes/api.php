<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\PrecioDominiosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\SistemaOperativoController;
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
// regiones
Route::get('getregiones',[CategoriasController::class,'showregiones']);
// comunas

// informacion del productos
Route::get('getcomunas/{id}',[CategoriasController::class,'showcomunas']);
Route::get('getsubcategorias/{id}',[SubcategoriasController::class,'show']);
Route::get('getproductos/{id}',[ProductosController::class,'show']);
Route::get('getperiodo/{id}',[ProductosController::class,'periodosproducto']);
Route::get('getperiodo/{id}/{id_periodo}',[ProductosController::class,'periodoproducto']);
Route::get('dominios/{dominio}/{extension}',[PrecioDominiosController::class,'dominios']);
Route::get('preciodominios',[PrecioDominiosController::class,'preciodominios']);
Route::get('getos/{tipo}',[SistemaOperativoController::class,'show']);
Route::get('getproductosxtipo/{id}/{tipo}',[ProductosController::class,'showxtipo']);

// empresa
Route::post('crearempresa',[EmpresasController::class,'store']);
Route::get('empresa/{email}',[EmpresasController::class,'showone']);

// generar order de compra

Route::post('generarorder',[ServiciosController::class,'crearservicio']);


