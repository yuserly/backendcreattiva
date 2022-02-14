<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Comunas;
use App\Models\Regiones;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show (){
        return Categorias::with('subcategoria')->get();
    }

    public function showregiones (){
        return Regiones::all();
    }

    public function showcomunas ($id){

        return Comunas::where('COM_REGION_ID', $id)->get();

    }
}
