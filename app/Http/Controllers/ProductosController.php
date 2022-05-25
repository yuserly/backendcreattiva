<?php

namespace App\Http\Controllers;

use App\Models\Periodos;
use App\Models\Productos;
use App\Models\RegistrosCarrito;
use App\Models\DetallesRegistrosCarrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

date_default_timezone_set("America/Santiago");

class ProductosController extends Controller
{
    public function show ($id){
       $productos =  Productos::where('subcategoria_id',$id)->with('caracteristicas','subcategoria.categoria')->get();

        // 4 es el periodo trienal

       $periodo = Periodos::where('id_periodo',4)->first();

       foreach ($productos as $key => $value) {

            $descuento = (($value["precio"] * $periodo["meses"]) * $periodo["descuento"]  ) / 100;

            $precio_con_descuento = round(($value["precio"] * $periodo["meses"]) - $descuento);

            $productos[$key]["precio_trienal"]  = $precio_con_descuento;

            $productos[$key]["descuento"]  = $periodo["descuento"];

            $productos[$key]["ahorro"]  = round(($value["precio"] * $periodo["meses"]) - $precio_con_descuento);
       }

       return $productos;
    }

    public function showxtipo ($id, $tipo){
        $productos =  Productos::where([['subcategoria_id',$id],['tipo_producto_id', $tipo]])->with('caracteristicas','subcategoria.categoria')->get();

         // 4 es el periodo trienal

        $periodo = Periodos::where('id_periodo',4)->first();

        foreach ($productos as $key => $value) {

             $descuento = (($value["precio"] * $periodo["meses"]) * $periodo["descuento"]  ) / 100;

             $precio_con_descuento = round(($value["precio"] * $periodo["meses"]) - $descuento);

             $productos[$key]["precio_trienal"]  = $precio_con_descuento;

             $productos[$key]["descuento"]  = $periodo["descuento"];

             $productos[$key]["ahorro"]  = round(($value["precio"] * $periodo["meses"]) - $precio_con_descuento);
        }

        return $productos;
     }

    public function periodosproducto($id){

        $producto = Productos::where('id_producto', $id)->first();
        //$periodos = Periodos::where('id_periodo','!=',1)->orderBy('meses','DESC')->get();
        $periodos = Periodos::select('periodos.*')
                    ->join('subcategorias_has_periodos','periodos.id_periodo','=','subcategorias_has_periodos.periodo_id')
                    ->where('subcategorias_has_periodos.subcategoria_id','=',$producto['subcategoria_id'])
                    ->orderBy('periodos.meses','DESC')
                    ->get();
        //$periodos = Periodos::orderBy('meses','DESC')->get();

        foreach ($periodos as $key => $value) {


            $descuento = (($producto["precio"] * $value["meses"]) * $value["descuento"]) / 100;

            $periodos[$key]["precio_descuento"] = round(($producto["precio"] * $value["meses"]) - $descuento);

            $periodos[$key]["precio"] = ($producto["precio"] * $value["meses"]);

            $periodos[$key]["precio_mensual"] = $producto["precio"];

            $periodos[$key]["ahorro"] = ($producto["precio"] * $value["meses"]) - round(($producto["precio"] * $value["meses"]) - $descuento);


        }

        return $periodos;
    }


    public function periodoproducto($id,$id_periodo){

        $producto = Productos::where('id_producto', $id)->first();
        $periodo = Periodos::where('id_periodo', $id_periodo)->first();
        $descuento = (($producto["precio"] * $periodo["meses"]) * $periodo["descuento"]) / 100;

        $periodo["precio_descuento"] = round(($producto["precio"] * $periodo["meses"]) - $descuento);

        $periodo["precio"] = ($producto["precio"] * $periodo["meses"]);

        $periodo["precio_mensual"] = $producto["precio"];

        $periodo["ahorro"] = ($producto["precio"] * $periodo["meses"]) - round(($producto["precio"] * $periodo["meses"]) - $descuento);

        return $periodo;


    }

    public function buscarproductos ($nombre){

        $productos =  Productos::where([['slug','like','%'.$nombre.'%']])->with('caracteristicas','subcategoria.categoria')->get();

        $periodo = Periodos::where('id_periodo',4)->first();

       foreach ($productos as $key => $value) {

            $descuento = (($value["precio"] * $periodo["meses"]) * $periodo["descuento"]  ) / 100;

            $precio_con_descuento = round(($value["precio"] * $periodo["meses"]) - $descuento);

            $productos[$key]["precio_trienal"]  = $precio_con_descuento;

            $productos[$key]["descuento"]  = $periodo["descuento"];

            $productos[$key]["ahorro"]  = round(($value["precio"] * $periodo["meses"]) - $precio_con_descuento);
       }

        return $productos;
     }

    public function showslug ($slug){



        $productos =  Productos::where('slug', $slug)->with('caracteristicas','subcategoria.categoria')->first();

        $periodo = Periodos::where('id_periodo',4)->first();

            $descuento = (($productos["precio"] * $periodo["meses"]) * $periodo["descuento"]  ) / 100;

            $precio_con_descuento = round(($productos["precio"] * $periodo["meses"]) - $descuento);

            $productos["precio_trienal"]  = $precio_con_descuento;

            $productos["descuento"]  = $periodo["descuento"];

            $productos["ahorro"]  = round(($productos["precio"] * $periodo["meses"]) - $precio_con_descuento);

        return $productos;
     }

     public function registroscarrito(Request $request){

        $data = request();
        $fecha = date('Y-m-d');
        $hora = date('H:m:s');
       

        $ip = $this->consultarip();

        $registros = RegistrosCarrito::where([
            ['ip_visitante',$ip],
            ['fecha',$fecha]
        ])->limit(1)->get();

        if($registros){

            return "hay";

        }else{ //si no hay registros, se guarda la info

            $notificacion = 1;
            $status_compra = 0;

            $insertRegistro = RegistrosCarrito::insert([
                'email' => 'kayla@example.com',
                'votes' => 0,
                'ip_visitante' => $ip, 
                'cliente_id' => null, 
                'fecha' => $fecha, 
                'hora' => $hora, 
                'notificacion' => $notificacion, 
                'status_compra' => $status_compra
            ]);

            if($insertRegistro){
                
                if($data['id_producto']!==null){ 
                //Registrar Producto en detalles del carro

                    //obtener ID del carrito registrado
                    $id = RegistrosCarrito::max('id_carrito');
                    //**********************************
        
                    $insertDetalle = DetallesRegistrosCarrito::insert([
                        'carrito_id' => $id,
                        'subcategoria_id' => $data['subcategoria_id'],
                        'producto_id'=> $data['id_producto'],
                        'nombre'=> $data['nombre'],
                        'email'=> $data['nombre'],
                        'telefono'=>'111111111',
                        'porcentaje_desc'=>null,
                        'url'=>null,
                        'dominio'=>'jesusparra.cl',
                        'ip_server'=>null,
                        'fecha'=>$fecha,
                        'hora'=>$hora
                    ]);


                }

            }

        }

        return $registros;


     }

     public function consultarip(){

        $ip = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])){

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }else{

            $ip = $_SERVER['REMOTE_ADDR'];

        }

        return $ip;

        
    }





}
