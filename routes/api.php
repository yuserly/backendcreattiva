<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\PrecioDominiosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\SistemaOperativoController;
use App\Http\Controllers\SubcategoriasController;
use App\Http\Controllers\CuponesController;
use App\Http\Controllers\VentasController;
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

//cupones
Route::get('validarcupon/{cupon}',[CuponesController::class,'validarcupon']);

Route::get('getcategorias',[CategoriasController::class,'show']);
// regiones
Route::get('getregiones',[CategoriasController::class,'showregiones']);
// comunas

// informacion del productos
Route::get('getcomunas/{id}',[CategoriasController::class,'showcomunas']);
Route::get('getsubcategorias/{id}',[SubcategoriasController::class,'show']);
Route::get('getsubcategoriaslug/{slug}',[SubcategoriasController::class,'showslug']);
Route::get('getproductos/{id}',[ProductosController::class,'show']);
Route::get('getperiodo/{id}',[ProductosController::class,'periodosproducto']);
Route::get('getperiodo/{id}/{id_periodo}',[ProductosController::class,'periodoproducto']);
Route::get('dominios/{dominio}/{extension}',[PrecioDominiosController::class,'dominios']);
Route::get('preciodominios',[PrecioDominiosController::class,'preciodominios']);
Route::get('getos/{tipo}',[SistemaOperativoController::class,'show']);
Route::get('getproductosxtipo/{id}/{tipo}',[ProductosController::class,'showxtipo']);
Route::get('getproductosbuscados/{nombre}',[ProductosController::class,'buscarproductos']);
Route::get('getproductosxslug/{slug}',[ProductosController::class,'showslug']);
// empresa
Route::post('crearempresa',[EmpresasController::class,'store']);
Route::get('empresa/{email}',[EmpresasController::class,'showone']);
Route::get('empresascliente/{email}',[EmpresasController::class,'showall']);
Route::get('empresa/xid/{id}',[EmpresasController::class,'showxid']);
Route::post('validarrut',[EmpresasController::class,'validarrut']);

// generar order de compra

Route::post('generarorder',[ServiciosController::class,'crearservicio']);

// generar codigo de acceso rapido
Route::post('/solicitudcodigo', [AuthController::class,'enviarcodigorapido']);

// servicios
Route::get('getserviciospendpago/{id}',[ServiciosController::class,'showpendpago']);
Route::get('getservicios/{id}/{subcategoria}',[ServiciosController::class,'show']);
Route::post('pagarventa',[ServiciosController::class,'pagarventa']);
// ventas

Route::get('getfacturaspendpago/{id}',[VentasController::class,'showpendpago']);

// login

Route::post('/login', [AuthController::class,'login']);
Route::post('/logincode', [AuthController::class,'logincode']);
Route::get('/solicitudcambiopass/{email}', [AuthController::class,'solicitudrecuperarpassword']);
Route::get('/getcodepassword/{code}', [AuthController::class,'getcodepassword']);
Route::post('/cambiopassword', [AuthController::class,'cambiopassword']);

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/validartoken', [AuthController::class,'validartoken']);

});



