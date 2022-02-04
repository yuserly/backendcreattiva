<?php

namespace App\Http\Controllers;

use App\Models\SistemaOperativo;
use Illuminate\Http\Request;

class SistemaOperativoController extends Controller
{
    public function show($tipo){

        $os =  SistemaOperativo::where('tipo', $tipo)->with('versiones')->get();


        foreach ($os as $key => $value) {
            if($key == 0){

                $os[$key]["active"] = 1;

            }else{

                $os[$key]["active"] = 0;

            }
        }

        return $os;
    }
}
