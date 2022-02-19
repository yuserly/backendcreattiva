<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpresasController extends Controller
{

    public function showone($email){

        $empresa = Empresas::where('email', $email)->first();

        return $this->successResponse($empresa, 'Consulta realizada exitosamente', true);

    }
    public function store(Request $request){

        $user = User::where('email',$request->email)->first();

        if($user){
            $user_id = $user->id;
        }else{

            $random = Str::random(8);

            $user = User::create([
                'email' => filter_var($request->email, FILTER_SANITIZE_EMAIL),
                'password' => Hash::make($random)
            ]);

            $user_id = $user->id;
        }

        if($request->isempresa){

            $tipo = 1;

        }else{
            $tipo = 0;
        }


        $empresa = Empresas::updateOrCreate(['user_id'=>$user_id],
                                            [
                                                'nombre' => filter_var($request->nombre, FILTER_SANITIZE_STRING),
                                                'tipo' => $tipo,
                                                'rut' => $request->rut,
                                                'email' => filter_var($request->email, FILTER_SANITIZE_EMAIL),
                                                'telefono' => filter_var($request->telefono, FILTER_SANITIZE_NUMBER_INT),
                                                'email_empresa'=> filter_var($request->emailempresa, FILTER_SANITIZE_EMAIL),
                                                'telefono_empresa' => filter_var($request->telefonoempresa, FILTER_SANITIZE_NUMBER_INT),
                                                'razonsocial' => filter_var($request->razonsocial, FILTER_SANITIZE_STRING),
                                                'giro' => filter_var($request->giro, FILTER_SANITIZE_STRING),
                                                'direccion' => filter_var($request->direccion, FILTER_SANITIZE_STRING),
                                                'pais' => filter_var($request->pais, FILTER_SANITIZE_STRING),
                                                'region' => $request->region,
                                                'comuna' => $request->comuna,
                                                'user_id' => $user_id
                                            ]);

        if($empresa){
            return $this->successResponse($empresa, 'Empresa creado exitosamente', true);
        }else{
            return $this->successResponse($empresa, 'Error al crear al Empresa', false);
        }

    }
}