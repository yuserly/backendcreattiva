<?php

namespace App\Http\Controllers;

use App\Models\Periodos;
use App\Models\PrecioDominios;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class PrecioDominiosController extends Controller
{

    public function preciodominios(){

        //$preciodominios = DB::connection('mysql_facturacion')->table('precio_dominio_comprarapida')->get();

        return PrecioDominios::all();

        //return $preciodominios;

    }

    public function dominios($dominio,$extension){


        $periodos = Periodos::where('id_periodo','!=',1)->orderBy('meses','DESC')->get();

        $extensiones =[

            "$extension",

            "com",

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
            $coincidencia = 'dominios '.$ext;

            foreach($precio as $keyp => $valuep){

                if($valuep['extension']===$ext){ //extension registrada y precio asignado

                    if($valuep['precio_manual_pesos']!==null){
                        $precioextfinal = $valuep['precio_manual_pesos'];
                    }else{
                        $precioextfinal = $valuep['precio'];
                    }

                    $producto = Productos::where('nombre','like', '%' . $coincidencia . '%' )->with('caracteristicas','subcategoria.categoria')->first();

                    $producto["precio"] = $precioextfinal;

                    foreach ($periodos as $key2 => $value2) {


                        $descuento = (($producto["precio"] * $value2["meses"]) * $value2["descuento"]) / 100;

                        $periodos[$key2]["precio_descuento"] = round(($producto["precio"] * $value2["meses"]) - $descuento);

                        $periodos[$key2]["precio"] = ($producto["precio"] * $value2["meses"]);

                        $periodos[$key2]["precio_mensual"] = $producto["precio"];

                        $periodos[$key2]["ahorro"] = ($producto["precio"] * $value2["meses"]) - round(($producto["precio"] * $value2["meses"]) - $descuento);


                    }

                    $dominiosarray["data"]["results"][$key]["precio_bd"] = $producto["precio"];
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
