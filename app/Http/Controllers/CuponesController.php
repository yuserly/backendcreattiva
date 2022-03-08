<?php

namespace App\Http\Controllers;

use App\Models\Cupones;
use App\Models\TipoDescuento;
use Illuminate\Http\Request;

class CuponesController extends Controller
{
    //
    public function validarcupon($cupon,$subcategoria_id){
        $cupon = Cupones::where([
            ['cupon','=',$cupon],
            ['subcategoria_id','=',$subcategoria_id]
        ])->first();
        if($cupon){

            $uso_max = $cupon['uso_max'];
            $uso_actual = $cupon['uso_actual'];

            if(($uso_max-$uso_actual > 0)){

                $tipoDescuento = TipoDescuento::where('id_tipo_descuento','=',$cupon['tipo_descuento_id'])->first();

                switch ($tipoDescuento['id_tipo_descuento']) {
                    case '1': //monto fijo
                        
                        return [
                            "monto" => $cupon['valor'],
                            "tipo_descuento" => 1
                        ];

                        break;
                    
                    case '2': //porcentaje
                        return [
                            "monto" => $cupon['valor'],
                            "tipo_descuento" => 2
                        ];
                        break;
                }

            }else{
                return [
                    "monto" => 0,
                    "tipo_descuento" => 1
                ];
            }

        }else{
            return [
                "monto" => 0,
                "tipo_descuento" => 1
            ];
        }

    }
}
