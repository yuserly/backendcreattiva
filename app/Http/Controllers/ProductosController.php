<?php

namespace App\Http\Controllers;

use App\Models\Periodos;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $periodos = Periodos::select('periodos.*','subcategorias_has_periodos.preseleccionado')
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


}
