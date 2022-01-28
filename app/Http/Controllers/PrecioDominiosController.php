<?php

namespace App\Http\Controllers;

use App\Models\Periodos;
use App\Models\PrecioDominios;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrecioDominiosController extends Controller
{

    public function preciodominios(){

        return PrecioDominios::all();

    }

    public function dominios($dominio,$extension){


        // id del producto de la base de datos en relacion al registro de dominios
        $producto = Productos::where('id_producto', 17)->first();

        $periodos = Periodos::where('id_periodo','!=',1)->orderBy('meses','DESC')->get();

        $extensiones =[

            "$extension",

            "net",

            "org",

            "store",

            "digital",

        ];

        $dominios = explode(",",$dominio);

        $domintex = [];


        for ($i=0; $i < count($extensiones); $i++) {

            for ($j=0; $j < count($dominios) ; $j++) {

                array_push($domintex, ["extension" => "$extensiones[$i]", "name"=> "$dominios[$j]"]);

            }

        }

        // $domintex = substr($domintex, 0, -1);


        $resp = Http::post('https://api.openprovider.eu/v1beta/auth/login',[
            'ip' => "200.35.158.254",
            'password' => "2021-Open$",
            'username' => "soporte@creattiva.cl"
        ]);

        $dn = json_decode($resp, true);

        $token = $dn["data"]["token"];

        $respdominio = Http::withToken($token)->post('https://api.openprovider.eu/v1beta/domains/check', [
            'domains' => $domintex,
            'with_price'=> true
        ]);

        $dominiosarray = json_decode($respdominio, true);

        $precio = $this->preciodominios();


        foreach ($dominiosarray["data"]["results"] as $key => $value) {
            $ext= explode(".",$value["domain"]);
            $ext = $ext[1];
            foreach ($precio as $key1 => $value1) {

                if($ext == $value1["extension"]){

                    // recorremos los periodos para establecer el precio

                    foreach ($periodos as $key2 => $value2) {

                        // el precio del dominio viene por año hay que pasar el periodo a año 

                        $year = $value2["meses"]/ 12;

                        $descuento = (($value1["precio"] * $year) * $value2["descuento"]) / 100;

                        $periodos[$key2]["precio_descuento"] = round(($value1["precio"] * $year) - $descuento);

                        $periodos[$key2]["precio"] = ($value1["precio"] * $year);

                        $periodos[$key2]["precio_mensual"] = $value1["precio"];

                        $periodos[$key2]["ahorro"] = ($value1["precio"] * $year) - round(($value1["precio"] * $year) - $descuento);

                        
                    }

                    $dominiosarray["data"]["results"][$key]["precio_bd"] = $value1["precio"];
                    $dominiosarray["data"]["results"][$key]["producto"] = $producto;
                    $dominiosarray["data"]["results"][$key]["periodos"] = $periodos;
                    $dominiosarray["data"]["results"][$key]["agregado"] = false;
                }


            }
        }

        return json_encode($dominiosarray) ;

        ;
    }
}
