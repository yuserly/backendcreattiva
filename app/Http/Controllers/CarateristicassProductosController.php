<?php

namespace App\Http\Controllers;
use App\Models\CarateristicassProductos;

use Illuminate\Http\Request;

date_default_timezone_set("America/Santiago");

class CarateristicassProductosController extends Controller
{
    //
    public function showall(){
        $caracteristicas = CarateristicassProductos::all();
        return $caracteristicas;
    }
    public function getcaracteristicasproducto($id){
        $caract = CarateristicassProductos::where('producto_id',$id)->get();
        return $caract;
    }
    
}
