<?php

namespace App\Http\Controllers;

use App\Mail\CodigoAccesoRapido;
use App\Models\Empresas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

date_default_timezone_set("America/Santiago");

class AuthController extends Controller
{
    public function login(Request $request){
        // return $request;

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $user = Auth::user();

            $empresas = Empresas::where('user_id', $user->id)->get();

            $response = [
                'token' => $user->createToken('tahuCoding')->plainTextToken,
                'empresas' => $empresas
            ];

            return $this->successResponse($response, 'login success', true);

        }else{
            return $this->successResponse('', 'contraseña incorrecta', true);
        }

    }

    public function logincode(Request $request){
        // return $request;

        $user = User::where('email', $request->email)->first();

        if($user->codigo_rapido == $request->code){

                Auth::loginUsingId($user->id);

                $user = Auth::user();

                $empresas = Empresas::where('user_id', $user->id)->get();

                $response = [
                    'token' => $user->createToken('tahuCoding')->plainTextToken,
                    'empresas' => $empresas
                ];

                return $this->successResponse($response, 'login success', true);

        }else{
            return $this->successResponse('', 'codigo incorrecto', true);
        }

    }

    public function logout(Request $request){

        $user = Auth::user();
        $user->tokens()->delete();
        return 1;
    }

    public function validartoken(){

        $response = [
            'ok' => true
        ];

        return $this->successResponse($response, 'token correcto', true);

    }

    public function enviarcodigorapido(Request $request){

        $user = User::where('email', $request->email)->first();
        if(isset($user)){
            $empresa = Empresas::where('user_id', $user->id)->first();
            $nombre = $empresa->nombre;
            $code = $this->generateCode(6);
            $upt = User::where('email', $request->email)->update([
                    'codigo_rapido'=> $code,
                    'fecha_codigo_rapido'=> date("Y-m-d H:i:s")
                ]);

                if(isset($upt)){
                    Mail::to($request->email)->send(new CodigoAccesoRapido($nombre,$code));
                    $response = [
                        'ok' => true
                    ];

                    return $this->successResponse($response, 'codigo enviado', true);

                }else{
                    $response = [
                        'ok' => false
                    ];

                    return $this->successResponse($response, 'error al actualizar codigo', true);

                }

        }else{

            $response = [
                'ok' => false
            ];

            return $this->successResponse($response, 'email no existe', true);

        }
    }

    public function generateCode($length) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}