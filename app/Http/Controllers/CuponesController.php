<?php

namespace App\Http\Controllers;

use App\Models\Cupones;
use App\Models\CuponesHasSubcategorias;
use App\Models\TipoDescuento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CuponesController extends Controller
{
    //
    public function validarcupon($cupon){
        $cupon = Cupones::where('cupon','=',$cupon)->first();

        if($cupon){

            $uso_max = $cupon['uso_max'];
            $uso_actual = $cupon['uso_actual'];
            $subcategorias = CuponesHasSubcategorias::where('cupon_id','=',$cupon->id_cupon)->get();

            if(($uso_max-$uso_actual > 0)){

                $tipoDescuento = TipoDescuento::where('id_tipo_descuento','=',$cupon['tipo_descuento_id'])->first();

                switch ($tipoDescuento['id_tipo_descuento']) {
                    case '1': //monto fijo

                        return [
                            "monto" => $cupon['valor'],
                            "tipo_descuento" => 1,
                            "subcategorias" => $subcategorias
                        ];

                        break;

                    case '2': //porcentaje
                        return [
                            "monto" => $cupon['valor'],
                            "tipo_descuento" => 2,
                            "subcategorias" => $subcategorias
                        ];
                        break;
                }

            }else{
                return [
                    "monto" => 0,
                    "tipo_descuento" => 1,
                    "subcategorias" => 0
                ];
            }

        }else{
            return [
                "monto" => 0,
                "tipo_descuento" => 1,
                "subcategorias" => 0
            ];
        }

    }

    public function showcupones(){

        return Cupones::with('tipo','subcategorias')->orderBy('created_at', 'DESC')->get();
    }

    public function showtipodescuento(){

        return TipoDescuento::all();
    }

    public function store(Request $request){

        $cupon = Str::random(6);

       $newcupon = Cupones::create([
            'cupon' => $cupon,
            'valor' => $request->valor,
            'fecha_vec' => $request->fecha_vec,
            'tipo_descuento_id' => $request->tipo_descuento_id["id_tipo_descuento"],
            'estado_id' => 4,
            'uso_max' => $request->uso_max
        ]);

            $arraySub = array();
                foreach($request->subcategoria_id as $item){

                    array_push($arraySub, $item['id_subcategoria']);
                }
                $newcupon->subcategorias()->sync($arraySub);

        return $newcupon;

    }

    public function destroy(Cupones $cupon){

        CuponesHasSubcategorias::where('cupon_id', $cupon->id_cupon)->delete();

        return $cupon->delete();
    }
}
