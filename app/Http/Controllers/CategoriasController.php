<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Comunas;
use App\Models\Regiones;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show (){
        return Categorias::with('subcategoria')->where('visible',1)->orderBy('posicion', 'asc')->get();
    }

    public function showregiones (){
        return Regiones::all();
    }

    public function showcomunas ($id){

        return Comunas::where('COM_REGION_ID', $id)->get();

    }

    public function validarnombrecategoria($nombre){

       $categoria =  Categorias::where('nombre', $nombre)->first();

         if($categoria){
             return 1;
         }else{

             return 0;
         }

    }

    public function store(Request $request){

        
        $slug = $this->GenerarSlug($request->nombre,$request->id_categoria);

        if(trim($request->posicion)!=''){

            $posicion = $request->posicion;
        
        }else{

            $posicionFinal = Categorias::orderBy('posicion','desc')->first();
            $posicion = $posicionFinal->posicion+1;

        }

        $caretgoria =  Categorias::updateOrCreate(['id_categoria' => $request->id_categoria],[
                                                  'nombre' => $request->nombre,
                                                  'slug' => $slug,
                                                  'visible' => $request->visible['id'],
                                                  'posicion' => $posicion
                                                ]);

        return $caretgoria;

    }

    public function GenerarSlug($name, $id = null){
        $max = 100;
        $out = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $out = substr(preg_replace("/[^-\/+|\w ]/", '', $out), 0, $max);
        $out = strtolower(trim($out, '-'));
        $out = preg_replace("/[\/_| -]+/", '-', $out);

        $equal = 0;
        if($id == null){
            $prod = Categorias::where('slug', $out)->first();
        }else{
            $prod = Categorias::where('slug', $out)->where('id_categoria', '!=', $id)->first();
        }

        while(!empty($prod))
        {
            $equal++;
            $outprueba = $out.'-'.$equal;
            $prod = Categorias::where('slug', $outprueba)->first();

            if(empty($prod))
            {
                $out = $out.'-'.$equal;
                return $out;
            }
        }

        return $out;
    }

    public function destroy(Categorias $categoria){

        
        return $categoria->delete();
    }

    public function desactivarcategoria($id){

        $item = Categorias::where('id_categoria',$id)->first();

        if($item->visible==1){

            $estado = 0;

        }else{

            $estado = 1;

        }

        $categoria = Categorias::where('id_categoria',$id)
                ->update([
                    'visible' => $estado
                ]);

        return $categoria;

    }

    public function updateordenmenu(Request $request){

        $data = request();

        $items = Categorias::all();

        foreach($data['data'] as $key=>$value){

            foreach($items as $key2=>$value2){

                if($value['id_categoria']==$value2['id_categoria']){

                    Categorias::where('id_categoria',$value2['id_categoria'])
                    ->update([
                        'posicion' => $key
                    ]);

                }

            }

        }

        return $data;

    }


}
