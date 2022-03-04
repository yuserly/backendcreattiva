<?php

namespace App\Http\Controllers;

use App\Models\Subcategorias;
use Illuminate\Http\Request;

class SubcategoriasController extends Controller
{
    public function show ($id){
        return Subcategorias::where('categoria_id',$id)->with('categoria')->get();
    }
    public function showslug($slug){
            return Subcategorias::where('slug',$slug)->first();
    }
}
