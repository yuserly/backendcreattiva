<?php

namespace App\Http\Controllers;

use App\Models\ContactoWeb;
use App\Models\RegistrosNewsletter;
use App\Models\PostulacionesCreattiva;
use App\Mail\ConsultaWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ContactoWebController extends Controller
{
    //
    public function registrar(Request $request){
        $data = request();

        if($data!='[]'){
            $registro = ContactoWeb::create([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'telefono'  => $data['telefono'],
                'mensaje'  => $data['mensaje'],
                'ip' => $this->obtenerip()
            ]);
            if($registro){
                //enviar correo
                //mail usuario
                Mail::to($data['email'])->send(new ConsultaWeb($data['nombre'],$data['email'],$data['telefono'],$data['mensaje'],'usuario'));

                //mail admin creattiva
                Mail::to('jesus@creattiva.cl')->send(new ConsultaWeb($data['nombre'],$data['email'],$data['telefono'],$data['mensaje'],'admin'));
                return 1;
            }else{
                return 0;
            }
        }

    }

    public function insertNewsletter(Request $request){
        $data = request();

        if($data!='[]'){
            $registro = RegistrosNewsletter::updateOrCreate([
                'email' => $data['email'],
                'ip' => $this->obtenerip(),
                'estado' => 0
            ]);
            if($registro){
                //enviar correo
                //mail usuario
                //Mail::to($data['email'])->send(new ConsultaWeb($data['nombre'],$data['email'],$data['telefono'],$data['mensaje'],'usuario'));

                //mail admin creattiva
                //Mail::to('jesus@creattiva.cl')->send(new ConsultaWeb($data['nombre'],$data['email'],$data['telefono'],$data['mensaje'],'admin'));
                return 1;
            }else{
                return 0;
            }
        }

    }

    public function obtenerip(){
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
       
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
    
        return $_SERVER['REMOTE_ADDR'];
    }

    public function registrarpostulacion(Request $request){
        
        $data = request();

        $registro = PostulacionesCreattiva::create([
            'nombre'=>$data['nombre'],
            'telefono'=>$data['telefono'],
            'email'=>$data['email'],
            'cargo'=>$data['cargo'],
            'ip'=>$this->obtenerip()
        ]);
        

        if($registro){
            return 1;
        }else{
            return 0;
        }

    }

    public function registrarpdfpostulacion(Request $request){

        $pdf = '';

        if($request->hasFile('pdf')){

            $pdf = Storage::disk('public')->putFile('/postulaciones', new file($request->file("pdf")));

        }

        $id = PostulacionesCreattiva::max('id');

        $registro = PostulacionesCreattiva::where('id', $id)->update(['pdf' => $pdf]);

        if($registro){
            return 1;
        }else{
            return 0;
        }

    }
}
