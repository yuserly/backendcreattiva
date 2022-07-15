<?php

namespace App\Http\Controllers;
use App\Models\CarateristicassProductos;
use App\Models\CaracteristicasHasProducto;
use App\Models\Productos;

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
    public function getcaracteristica($id){
        $caract = CarateristicassProductos::where('id_carateristica_producto',$id)->first();
        
        if($caract){
            $producto = Productos::where('id_producto',$caract->producto_id)->first();
            return $producto;
        }

    }
    public function addcaract(Request $request){
        $data = request();

        $caract = CarateristicassProductos::create([
            'nombre' => $data['nombre'],
            'capacidad' => $data['capacidad'],
            'producto_id' => $data['producto_id']
        ]);

        $id = CarateristicassProductos::max('id_carateristica_producto');

        CaracteristicasHasProducto::create([
            'producto_id' => $data['producto_id'],
            'carateristica_producto_id' => $id
        ]);

        return $caract;
    }
    public function store(Request $request){

        $caracte = CarateristicassProductos::updateOrCreate(['id_carateristica_producto' => $request->id_carateristica_producto],
        [
            'nombre' => $request->nombre,
            'capacidad' => $request->capacidad,
            'producto_id' => $request->producto_id['id_producto']
        ]);
        return $caracte;

    }

    public function destroy(CarateristicassProductos $caracteristica){

        return $caracteristica->delete();
    }
    
}
