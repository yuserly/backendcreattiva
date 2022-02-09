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
        $periodos = Periodos::where('id_periodo','!=',1)->orderBy('meses','DESC')->get();

        foreach ($periodos as $key => $value) {

            if($id == 17){

                $year = $value["meses"]/ 12;

            }else{
                $year = $value["meses"];
            }


            $descuento = (($producto["precio"] * $year) * $value["descuento"]) / 100;

            $periodos[$key]["precio_descuento"] = round(($producto["precio"] * $year) - $descuento);

            $periodos[$key]["precio"] = ($producto["precio"] * $year);

            $periodos[$key]["precio_mensual"] = $producto["precio"];

            $periodos[$key]["ahorro"] = ($producto["precio"] * $year) - round(($producto["precio"] * $year) - $descuento);


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
