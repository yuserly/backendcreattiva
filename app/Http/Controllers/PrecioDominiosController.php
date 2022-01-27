<?php

namespace App\Http\Controllers;

use App\Models\PrecioDominios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrecioDominiosController extends Controller
{

    public function preciodominios(){

        return PrecioDominios::all();

    }

    public function dominios($dominio,$extension){


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

                    $dominiosarray["data"]["results"][$key]["precio_bd"] = number_format($value1["precio"], 0, ',', '.');
                }


            }
        }

        return json_encode($dominiosarray) ;

        ;
    }
}
