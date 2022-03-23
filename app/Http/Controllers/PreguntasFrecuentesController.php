<?php

namespace App\Http\Controllers;

use App\Models\PreguntasFrecuentes;
use Illuminate\Http\Request;

class PreguntasFrecuentesController extends Controller
{
    //
    public function showall(){

        $preguntas = PreguntasFrecuentes::all();
        return $preguntas;

    }
}
