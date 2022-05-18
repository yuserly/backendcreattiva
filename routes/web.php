<?php

use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\VentasController;
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

Route::match(['get','post'],'/return/token',[ServiciosController::class,'validarrpago']);
Route::get('returnsuccess/paypal',[ServiciosController::class,'successTransaction']);
Route::get('returncancel/paypal',[ServiciosController::class,'cancelTransaction']);

Route::get('returncancel/paypal',[ServiciosController::class,'cancelTransaction']);

Route::get('pago/webpayplus/{token}',[VentasController::class,'rediretpagowebpayplus']);
Route::get('pago/oneclick/{token}',[VentasController::class,'rediretpagooneclick']);





Route::match(['get','post'],'/resultado/inscripcion',[ServiciosController::class,'validarinscripcion']);

