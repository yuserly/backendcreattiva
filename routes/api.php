<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CarateristicassProductosController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\PrecioDominiosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\SistemaOperativoController;
use App\Http\Controllers\SubcategoriasController;
use App\Http\Controllers\CuponesController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ContactoWebController;
use App\Http\Controllers\PeriodosController;
use App\Http\Controllers\PreguntasFrecuentesController;
use App\Http\Controllers\BannersController;
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

//Formulario de contacto
Route::post('/registrarconsulta', [ContactoWebController::class,'registrar']);

//Postulacion
Route::post('/registrarpostulacion', [ContactoWebController::class,'registrarpostulacion']);
Route::post('/registrarpdfpostulacion', [ContactoWebController::class,'registrarpdfpostulacion']);

//newsletter
Route::post('/registrarnewsletter', [ContactoWebController::class,'insertNewsletter']);

// servicios
Route::get('getserviciospendpago/{id}',[ServiciosController::class,'showpendpago']);
Route::get('getservicios/{id}/{subcategoria}',[ServiciosController::class,'show']);
Route::post('pagarventa',[ServiciosController::class,'pagarventa']);
Route::get('getconsultarservicios/{id_empresa}',[ServiciosController::class,'consultarServicios']);
// ventas

Route::get('getfacturaspendpago/{id}',[VentasController::class,'showpendpago']);

// login

Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout']);
Route::post('/logincode', [AuthController::class,'logincode']);
Route::get('/solicitudcambiopass/{email}', [AuthController::class,'solicitudrecuperarpassword']);
Route::get('/getcodepassword/{code}', [AuthController::class,'getcodepassword']);
Route::post('/cambiopassword', [AuthController::class,'cambiopassword']);

Route::post('/loginadmin', [AuthController::class,'loginadmin']);
Route::post('logoutadmin',[AuthController::class,'logoutUser']);

//Obtener IP
Route::get('/consultarip', [AuthController::class,'consultarip']);

//registros tipo de producto ecommerce
Route::post('solicitudjumpseller',[ProductosController::class,'solicitudjumpseller']);

//preguntas frecuentes
Route::get('/preguntasfrecuentesall', [PreguntasFrecuentesController::class,'showall']);
Route::get('/getfaq/{slug}', [PreguntasFrecuentesController::class,'getfaq']);
Route::get('/getpreguntasfrecuentesbuscadas/{nombre}',[PreguntasFrecuentesController::class,'buscarpreguntasfrecuentes']);

//banners
Route::get('/getbanners', [BannersController::class,'getbanners']);

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/validartoken', [AuthController::class,'validartoken']);

});

//Registro de productos agregados al carro
Route::post('registroscarrito',[ProductosController::class,'registroscarrito']);

// aqui las rutas del admin


Route::prefix('admin')->middleware('auth:sanctum')->group(function(){

    Route::get('getcategorias',[CategoriasController::class,'show']);
    Route::post('crearcategorias', [CategoriasController::class,'store']);
    Route::get('validarnombrecategoria/{nombre}', [CategoriasController::class,'validarnombrecategoria']);
    Route::delete('eliminarcategoria/{categoria}', [CategoriasController::class, 'destroy']);

    //productos
    Route::get('getproductos',[ProductosController::class,'showall']);
    Route::get('gettipoproductos',[ProductosController::class,'showalltipoproductos']);
    Route::get('gettipoproducto/{id}',[ProductosController::class,'getTipoProducto']);
    Route::post('crearproducto', [ProductosController::class,'store']);
    Route::get('getcaracteristicas',[CarateristicassProductosController::class,'showall']);
    Route::post('prevslug', [ProductosController::class,'prevslug']);
    Route::get('eliminarproducto/{id}', [ProductosController::class, 'desactivarproducto']);
    Route::get('getcaracteristicas/{id}', [CarateristicassProductosController::class, 'getcaracteristicasproducto']);
    //********/

    // categoria y subcategorias

    Route::get('getsubcategorias',[SubcategoriasController::class,'showsub']);
    Route::get('getsubcategorias/{id}',[SubcategoriasController::class,'showxid']);
    Route::get('validarnombresubcategoria/{nombre}', [SubcategoriasController::class,'validarnombresubcategoria']);
    Route::post('crearsubcategorias', [SubcategoriasController::class,'store']);
    Route::delete('eliminarsubcategoria/{subcategoria}', [SubcategoriasController::class, 'destroy']);

    Route::get('getperiodos', [PeriodosController::class, 'show']);

    // banner

    Route::get('showabanner', [BannersController::class, 'showabanner']);
    Route::post('crearbanner', [BannersController::class, 'store']);
    Route::get('showabanner', [BannersController::class, 'showabanner']);
    Route::delete('eliminarbanner/{banner}', [BannersController::class, 'destroy']);
    Route::get('actbanner/{id_banner}/{estado}', [BannersController::class, 'actbanner']);


    //  cupones

    Route::get('showcupones', [CuponesController::class, 'showcupones']);
    Route::post('crearcupon', [CuponesController::class, 'store']);
    Route::delete('eliminarcupon/{cupon}', [CuponesController::class, 'destroy']);



    // tipo descueto

    Route::get('showtipodescuento', [CuponesController::class, 'showtipodescuento']);



});
