<?php

namespace App\Http\Controllers;

use App\Models\PreguntasFrecuentes;
use Illuminate\Http\Request;

class PreguntasFrecuentesController extends Controller
{
    //
    public function showall(){

        $preguntas = PreguntasFrecuentes::all();

        foreach($preguntas as $key=>$value){
            $value->titulo = utf8_decode($value['TITULO_PAGINA']);
        }

        return $preguntas;

    }

    public function getfaq($slug){

        $pregunta = PreguntasFrecuentes::where('URL_PAGINA','=',$slug)->get();

        foreach($pregunta as $key=>$value){
            $value->titulo = utf8_decode($value['TITULO_PAGINA']);
        }

        return $pregunta;

    }

    public function buscarpreguntasfrecuentes ($nombre){

        $preguntasf =  PreguntasFrecuentes::where([['URL_PAGINA','like','%'.$nombre.'%']])->get();

        foreach($preguntasf as $key=>$value){
            $value->titulo = utf8_decode($value['TITULO_PAGINA']);
        }

        return $preguntasf;
    }

    public function store(Request $request){

        if(!asset($request->ID_PAGINA)){

            $slug = $this->GenerarSlug($request->titulo_pagina);

        }else{

            if(trim($request->url)!=''){

                $slug = $request->url;

            }else{

                $slug = $this->GenerarSlug($request->titulo_pagina,$request->ID_PAGINA);

            }

        }

        $newfaq =  PreguntasFrecuentes::updateOrCreate(['ID_PAGINA' => $request->ID_PAGINA],[
                                            'TITULO_PAGINA' => $request->titulo_pagina,
                                            'SUBTITULO_PAGINA' => $request->subtitulo,
                                            'ID_PAGINA_PERTENECE' => 0,
                                            'ORDEN_PAGINA' => 0,
                                            'CONTENIDO_PAGINA' => $request->contenido_html,
                                            'SCRIPTS_PAGINA' => '',
                                            'DESCRIPCION_PAGINA' => $request->meta_descripcion,
                                            'KEYWORDS_PAGINA' => $request->keywords,
                                            'title' => $request->meta_title,
                                            'h1pagina' => $request->h1_pagina,
                                            'URL_PAGINA' => $slug,
                                            'SI_UTIL' => 0,
                                            'NO_UTIL' => 0,
                                            'ESTADO_PAGINA' => $request->estado_pagina['id']
                                        ]);

        return $newfaq;

    }

    public function GenerarSlug($name, $id = null){
        $max = 100;
        $out = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $out = substr(preg_replace("/[^-\/+|\w ]/", '', $out), 0, $max);
        $out = strtolower(trim($out, '-'));
        $out = preg_replace("/[\/_| -]+/", '-', $out);

        $equal = 0;
        if($id == null){
            $prod = PreguntasFrecuentes::where('URL_PAGINA', $out)->first();
        }else{
            $prod = PreguntasFrecuentes::where('URL_PAGINA', $out)->where('ID_PAGINA', $id)->first();
            //$prod = PreguntasFrecuentes::where('URL_PAGINA', $out)->where('ID_PAGINA Primaria', '!=', $id)->first();
        }

        while(!empty($prod))
        {
            $equal++;
            $outprueba = $out.'-'.$equal;
            $prod = PreguntasFrecuentes::where('URL_PAGINA', $outprueba)->first();

            if(empty($prod))
            {
                $out = $out.'-'.$equal;
                return $out;
            }
        }

        return $out;
    }

    public function prevslug(Request $request){

        $data = request();

        $max = 100;
        $out = iconv('UTF-8', 'ASCII//TRANSLIT', $data['nombre']);
        $out = substr(preg_replace("/[^-\/+|\w ]/", '', $out), 0, $max);
        $out = strtolower(trim($out, '-'));
        $out = preg_replace("/[\/_| -]+/", '-', $out);

        $equal = 0;
        if($data['id_pagina'] == null){
            $prod = PreguntasFrecuentes::where('URL_PAGINA', $out)->first();
        }else{
            $prod = PreguntasFrecuentes::where('URL_PAGINA', $out)->where('ID_PAGINA', $data['id_pagina'])->first();
            //$prod = PreguntasFrecuentes::where('URL_PAGINA', $out)->where('ID_PAGINA Primaria', '!=', $data['id_pagina'])->first();
        }

        while(!empty($prod))
        {
            $equal++;
            $outprueba = $out.'-'.$equal;
            $prod = PreguntasFrecuentes::where('URL_PAGINA', $outprueba)->first();

            if(empty($prod))
            {
                $out = $out.'-'.$equal;
                return $out;
            }
        }

        return $out;

    }

    public function destroy($id){

        $faq = PreguntasFrecuentes::where('ID_PAGINA', $id)->delete();

        return $faq;

    }

}
