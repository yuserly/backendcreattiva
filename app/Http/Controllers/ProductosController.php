<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductosController extends Controller
{
    public function show ($id){
        return Productos::where('subcategoria_id',$id)->with('caracteristicas','subcategoria.categoria')->get();
    }


}
