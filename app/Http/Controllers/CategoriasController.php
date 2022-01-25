<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show (){
        return Categorias::with('subcategoria')->get();
    }
}
