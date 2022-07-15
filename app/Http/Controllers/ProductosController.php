<?php

namespace App\Http\Controllers;

use App\Models\Periodos;
use App\Models\Productos;
use App\Models\TipoProducto;
use App\Models\Empresas;
use App\Models\RegistrosCarrito;
use App\Models\SolicitudesJumpseller;
use App\Models\DetallesRegistrosCarrito;
use App\Models\SubcategoriasHasPeriodos;
use App\Models\CarateristicassProductos;
use App\Models\CaracteristicasHasProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

date_default_timezone_set("America/Santiago");

class ProductosController extends Controller
{
    public function show ($id){
       $productos =  Productos::where('subcategoria_id',$id)->with('caracteristicas','subcategoria.categoria')->get();

        // 4 es el periodo trienal

       $periodo = Periodos::where('id_periodo',4)->first();

       foreach ($productos as $key => $value) {

            $descuento = (($value["precio"] * $periodo["meses"]) * $periodo["descuento"]  ) / 100;

            $precio_con_descuento = round(($value["precio"] * $periodo["meses"]) - $descuento);

            $productos[$key]["precio_trienal"]  = $precio_con_descuento;

            $productos[$key]["descuento"]  = $periodo["descuento"];

            $productos[$key]["ahorro"]  = round(($value["precio"] * $periodo["meses"]) - $precio_con_descuento);
       }

       return $productos;
    }

    public function showxtipo ($id, $tipo){
        $productos =  Productos::where([['subcategoria_id',$id],['tipo_producto_id', $tipo]])->with('caracteristicas','subcategoria.categoria')->get();

         // 4 es el periodo trienal

        $periodo = Periodos::where('id_periodo',4)->first();

        foreach ($productos as $key => $value) {

             $descuento = (($value["precio"] * $periodo["meses"]) * $periodo["descuento"]  ) / 100;

             $precio_con_descuento = round(($value["precio"] * $periodo["meses"]) - $descuento);

             $productos[$key]["precio_trienal"]  = $precio_con_descuento;

             $productos[$key]["descuento"]  = $periodo["descuento"];

             $productos[$key]["ahorro"]  = round(($value["precio"] * $periodo["meses"]) - $precio_con_descuento);
        }

        return $productos;
     }

    public function periodosproducto($id){

        $producto = Productos::where('id_producto', $id)->first();
        //$periodos = Periodos::where('id_periodo','!=',1)->orderBy('meses','DESC')->get();
        $periodos = Periodos::select('periodos.*')
                    ->join('subcategorias_has_periodos','periodos.id_periodo','=','subcategorias_has_periodos.periodo_id')
                    ->where('subcategorias_has_periodos.subcategoria_id','=',$producto['subcategoria_id'])
                    ->orderBy('periodos.meses','DESC')
                    ->get();
        //$periodos = Periodos::orderBy('meses','DESC')->get();

        foreach ($periodos as $key => $value) {


            $descuento = (($producto["precio"] * $value["meses"]) * $value["descuento"]) / 100;

            $periodos[$key]["precio_descuento"] = round(($producto["precio"] * $value["meses"]) - $descuento);

            $periodos[$key]["precio"] = ($producto["precio"] * $value["meses"]);

            $periodos[$key]["precio_mensual"] = $producto["precio"];

            $periodos[$key]["ahorro"] = ($producto["precio"] * $value["meses"]) - round(($producto["precio"] * $value["meses"]) - $descuento);


        }

        return $periodos;
    }


    public function periodoproducto($id,$id_periodo){

        $producto = Productos::where('id_producto', $id)->first();
        $periodo = Periodos::where('id_periodo', $id_periodo)->first();
        $descuento = (($producto["precio"] * $periodo["meses"]) * $periodo["descuento"]) / 100;

        $periodo["precio_descuento"] = round(($producto["precio"] * $periodo["meses"]) - $descuento);

        $periodo["precio"] = ($producto["precio"] * $periodo["meses"]);

        $periodo["precio_mensual"] = $producto["precio"];

        $periodo["ahorro"] = ($producto["precio"] * $periodo["meses"]) - round(($producto["precio"] * $periodo["meses"]) - $descuento);

        return $periodo;


    }

    public function buscarproductos ($nombre){

        $productos =  Productos::where([['slug','like','%'.$nombre.'%']])->with('caracteristicas','subcategoria.categoria')->get();

        $periodo = Periodos::where('id_periodo',4)->first();

       foreach ($productos as $key => $value) {

            $descuento = (($value["precio"] * $periodo["meses"]) * $periodo["descuento"]  ) / 100;

            $precio_con_descuento = round(($value["precio"] * $periodo["meses"]) - $descuento);

            $productos[$key]["precio_trienal"]  = $precio_con_descuento;

            $productos[$key]["descuento"]  = $periodo["descuento"];

            $productos[$key]["ahorro"]  = round(($value["precio"] * $periodo["meses"]) - $precio_con_descuento);
       }

        return $productos;
     }

    public function showslug ($slug){



        $productos =  Productos::where('slug', $slug)->with('caracteristicas','subcategoria.categoria')->first();

        $periodo = Periodos::where('id_periodo',4)->first();

            $descuento = (($productos["precio"] * $periodo["meses"]) * $periodo["descuento"]  ) / 100;

            $precio_con_descuento = round(($productos["precio"] * $periodo["meses"]) - $descuento);

            $productos["precio_trienal"]  = $precio_con_descuento;

            $productos["descuento"]  = $periodo["descuento"];

            $productos["ahorro"]  = round(($productos["precio"] * $periodo["meses"]) - $precio_con_descuento);

        return $productos;
     }

     public function registroscarrito(Request $request){

        $data = request();

        //return $data;

        if($data[0]['opc']=='add')
          $resp =   $this->CarritoAdd($data);
        elseif($data[0]['opc']=='updt')
          $resp =   $this->CarritoUpdt($data);

        return $resp;


     }

     public function consultarip(){

        $ip = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])){

            $ip = $_SERVER['HTTP_CLIENT_IP'];

        }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        }else{

            $ip = $_SERVER['REMOTE_ADDR'];

        }

        return $ip;

        
    }

    public function CarritoAdd($data){

        $fecha = date('Y-m-d');
        $hora = date('H:m:s');
        $telefono = null;
        $user_id = null;
        $dominio = null;
        $nombre = null;
        $email = null;
        $url = null;

        if(isset($data[0]['data']['id_producto'])){

            $id_producto = $data[0]['data']['id_producto'];

            $id_subcategoria = $data[0]['data']['subcategoria_id'];

        }elseif($data[0]['data']['producto']['id_producto']){

            $id_producto = $data[0]['data']['producto']['id_producto'];

            $id_subcategoria = $data[0]['data']['producto']['subcategoria_id'];

        }

        if(isset($data[0]['data']['dominio'])){

            $dominio = $data[0]['data']['dominio'];

        }

        if(isset($data[0]['adicionales'][0]['usuario']['nombre'])){
            $nombre = $data[0]['adicionales'][0]['usuario']['nombre'];
        }

        if(isset($data[0]['adicionales'][0]['usuario']['email'])){
            $email = $data[0]['adicionales'][0]['usuario']['nombre'];
        }

        if(isset($data[0]['adicionales'][0]['url'])){
            $url = $data[0]['adicionales'][0]['url'];
        }


        if(isset($data[0]['adicionales'][0]['usuario']['email'])){

            $empresa = Empresas::where('email', $data[0]['adicionales'][0]['usuario']['email'])->first();
            $telefono = $empresa['telefono'];
            $user_id = $empresa['user_id'];
        }
       
        $ip = $this->consultarip();

        $registros = RegistrosCarrito::where([
            ['ip_visitante',$ip],
            ['fecha',$fecha]
        ])->limit(1)->get();

        if(count($registros)>0){//Si existe, se actualizan datos

            //insertar detalles adicionales de carrito
            $registros_detalles = DetallesRegistrosCarrito::where([
                ['fecha',$fecha],
                ['carrito_id','=',$registros[0]['id_carrito']]
            ])->get();

            $existeproducto = false;

            foreach($registros_detalles as $key=>$value){

                if($value['producto_id']==$id_producto){

                    //validar si el producto existe en la lista
                    $existeproducto = true;

                }

            }

            if($existeproducto==false){ 
            //Si el producto no existe, agregar a detalles

                $insertDetalle = DetallesRegistrosCarrito::insert([
                    'carrito_id' => $registros[0]['id_carrito'],
                    'subcategoria_id' => $id_subcategoria,
                    'producto_id'=> $id_producto,
                    'nombre'=> $nombre,
                    'email'=> $email,
                    'telefono'=>$telefono,
                    'porcentaje_desc'=>null,
                    'url'=>$url,
                    'dominio'=>$dominio,
                    'ip_server'=>null,
                    'fecha'=>$fecha,
                    'hora'=>$hora
                ]);

            }else{ 
            //actualizar datos de los detalles del producto

                $updateDetalle = DetallesRegistrosCarrito::

                where([
                    ['carrito_id',$registros[0]['id_carrito']],
                    ['fecha',$fecha],
                    ['producto_id',$id_producto]
                ])

                ->update([
                    'nombre'=> $nombre,
                    'email'=> $email,
                    'telefono'=>$telefono,
                    'porcentaje_desc'=>null,
                    'url'=>$url,
                    'dominio'=>$dominio,
                    'ip_server'=>null
                ]);

            }


        }else{ //si no hay registros, se guarda la info

            $notificacion = 1;
            $status_compra = 0;

            $insertRegistro = RegistrosCarrito::insert([
                'ip_visitante' => $ip, 
                'sitio' => 'creattiva.cl',
                'cliente_id' => $user_id, 
                'fecha' => $fecha, 
                'hora' => $hora, 
                'notificacion' => $notificacion, 
                'status_compra' => $status_compra
            ]);

            if($insertRegistro){
                
                if($id_producto!==null){ 
                //Registrar Producto en detalles del carro

                    //obtener ID del carrito registrado
                    $id = RegistrosCarrito::max('id_carrito');
                    //**********************************
        
                    $insertDetalle = DetallesRegistrosCarrito::insert([
                        'carrito_id' => $id,
                        'subcategoria_id' => $id_subcategoria,
                        'producto_id'=> $id_producto,
                        'nombre'=> $nombre,
                        'email'=> $email,
                        'telefono'=>$telefono,
                        'porcentaje_desc'=>null,
                        'url'=>$url,
                        'dominio'=>$dominio,
                        'ip_server'=>null,
                        'fecha'=>$fecha,
                        'hora'=>$hora
                    ]);


                }

            }

        }

    }

    public function CarritoUpdt($data){

        $fecha = date('Y-m-d');
        $hora = date('H:m:s');
        $dominio = null;
        $ip_server = null;
        $telefono = null;
        $user_id = null;
        $ip = $this->consultarip();
        $nombre = null;
        $email = null;
        $url = null;

        if(isset($data[0]['data']['id_producto'])){

            $id_producto = $data[0]['data']['id_producto'];
            $id_subcategoria = $data[0]['data']['subcategoria_id'];

        }elseif($data[0]['data']['producto']['id_producto']){

            $id_producto = $data[0]['data']['producto']['id_producto'];
            $id_subcategoria = $data[0]['data']['producto']['subcategoria_id'];

        }
        if(isset($data[0]['data']['dominio']))

            $dominio = $data[0]['data']['dominio'];

        if(isset($data[0]['data']['ip']))

            $ip_server = $data[0]['data']['ip'];

        if(isset($data[0]['adicionales'][0]['usuario']['nombre'])){
            $nombre = $data[0]['adicionales'][0]['usuario']['nombre'];
        }

        if(isset($data[0]['adicionales'][0]['usuario']['email'])){
            $email = $data[0]['adicionales'][0]['usuario']['nombre'];
        }

        if(isset($data[0]['adicionales'][0]['url'])){
            $url = $data[0]['adicionales'][0]['url'];
        }

        if(isset($data[0]['adicionales'][0]['usuario']['email'])){

            $empresa = Empresas::where('email', $data[0]['adicionales'][0]['usuario']['email'])->first();
            $telefono = $empresa['telefono'];
            $user_id = $empresa['user_id'];
        }

        $registros = RegistrosCarrito::where([
            ['ip_visitante',$ip],
            ['fecha',$fecha]
        ])->limit(1)->get();

        //return $data[0]['data'][0]['producto']['id_producto'];

        if(count($registros)>0){//Si existe, se actualizan datos

            //insertar detalles adicionales de carrito
            $registros_detalles = DetallesRegistrosCarrito::where([
                ['fecha',$fecha],
                ['carrito_id','=',$registros[0]['id_carrito']]
            ])->get();

            $existeproducto = false;

            foreach($registros_detalles as $key=>$value){

                if($value['producto_id']==$id_producto){

                    //validar si el producto existe en la lista
                    $existeproducto = true;

                }

            }

            //actualizar datos de los detalles del producto
            
            if(!$existeproducto){

                $insertDetalle = DetallesRegistrosCarrito::insert([
                    'carrito_id' => $registros[0]['id_carrito'],
                    'subcategoria_id' => $id_subcategoria,
                    'producto_id'=> $id_producto,
                    'nombre'=> $nombre,
                    'email'=> $email,
                    'telefono'=>$telefono,
                    'porcentaje_desc'=>null,
                    'url'=>$url,
                    'dominio'=>$dominio,
                    'ip_server'=>$ip_server,
                    'fecha'=>$fecha,
                    'hora'=>$hora
                ]);

                

            }else{

                $updateDetalle = DetallesRegistrosCarrito::

                where([
                    ['carrito_id',$registros[0]['id_carrito']],
                    ['fecha',$fecha],
                    ['producto_id',$id_producto]
                ])

                ->update([
                    'dominio'=>$dominio,
                    'ip_server'=>$ip_server
                ]);

            }   
            
        }

        //return $data;

    }

    public function solicitudjumpseller(Request $request){

        $data = request();

        if($data['tipocontrato']==1){
            $tipoc = 'persona';
        }elseif($data['tipocontrato']==2){
            $tipoc = 'empresa';
        }else{
            $tipoc = 'persona';
        }

        $ip = $this->consultarip();

        $ecommerces = SolicitudesJumpseller::where('ip',$ip)->first();

        $ecommerce = SolicitudesJumpseller::updateOrCreate([

            'email' => $data['email'],
            'tipocliente' => $tipoc,
            'nombrecliente' => $data['nombre'],
            'rut' => $data['rut'],
            'telefono' => $data['telefono'],
            'giro' => $data['giro'],
            'direccion' => $data['direccion'],
            'nombretienda' => $data['nombretienda'],
            'idproducto' => $data['idproducto'],
            'idperiodo' => $data['periodo_select'],
            'ip' => $ip,
            'status' => 0

        ]);

        return $ecommerce;

    }

    public function showalltipoproductos(){

        $data = TipoProducto::all();
        return $data;

    }

    public function getTipoProducto($id){

        $producto = TipoProducto::where('id_tipo_producto',$id)->first();

        return $producto;
    }

    public function showall (){
        $productos =  Productos::with('caracteristicas','subcategoria.subcategoriasperiodos')->orderBy('productos.id_producto', 'asc')->get();

         // 4 es el periodo trienal
 
        $periodo = Periodos::where('id_periodo',4)->first();
 
        foreach ($productos as $key => $value) {
 
             $descuento = (($value["precio"] * $periodo["meses"]) * $periodo["descuento"]  ) / 100;
 
             $precio_con_descuento = round(($value["precio"] * $periodo["meses"]) - $descuento);
 
             $productos[$key]["precio_trienal"]  = $precio_con_descuento;
 
             $productos[$key]["descuento"]  = $periodo["descuento"];
 
             $productos[$key]["ahorro"]  = round(($value["precio"] * $periodo["meses"]) - $precio_con_descuento);
        }
 
        return $productos;
     }

     public function store(Request $request){

        $data = request();

        //

        if($data['opcion']==='update'){

            $producto =  Productos::
            where('id_producto',$data['producto_id'])
            ->update([
                'nombre' => $data['nombre'],
                'slug' => $data['slug'],
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_key' => $data['meta_key'],
                'precio' => $data['precio'],
                'visible' => $data['visible']['id'],
                'subcategoria_id' => $data['subcategoria_id'],
                'tipo_producto_id' => $data['tipo_producto_id']
            ]);

            if($producto){
                $options = CaracteristicasHasProducto::where('producto_id',$data['producto_id'])->delete();
                $options2 = CarateristicassProductos::where('producto_id',$data['producto_id'])->delete();

                if($data['caracteristicas']){

                    if(count($data['caracteristicas'])>0){
                
                        foreach($data['caracteristicas'] as $key => $value){

                            CarateristicassProductos::create([
                                'nombre' => $value['nombre'],
                                'capacidad' => $value['capacidad'],
                                'producto_id' => $data['producto_id']
                            ]);

                            $id = CarateristicassProductos::max('id_carateristica_producto');

                            CaracteristicasHasProducto::create([
                                'producto_id' => $data['producto_id'],
                                'carateristica_producto_id' => $id
                            ]);
    
                        }
    
                    }

                }

            }

        }elseif($data['opcion']==='create'){
            
            $slug = $this->GenerarSlug($data['nombre']);

            $producto =  Productos::
            create([
                'nombre' => $data['nombre'],
                'slug' => $slug,
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_key' => $data['meta_key'],
                'precio' => $data['precio'],
                'visible' => $data['visible']['id'],
                'subcategoria_id' => $data['subcategoria_id'],
                'tipo_producto_id' => $data['tipo_producto_nombre']['id_tipo_producto']
            ]);

            $producto_id = Productos::max('id_producto');

            if($producto){

                if($data['caracteristicas']){

                    if(count($data['caracteristicas'])>0){
                
                        foreach($data['caracteristicas'] as $key => $value){
                            CarateristicassProductos::create([
                                'nombre' => $value['nombre'],
                                'capacidad' => $value['capacidad'],
                                'producto_id' => $producto_id
                            ]);
                        }
    
                    }

                }

            }

        }

        return $producto;

    }

    public function GenerarSlug($name, $id = null){
        $max = 100;
        $out = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $out = substr(preg_replace("/[^-\/+|\w ]/", '', $out), 0, $max);
        $out = strtolower(trim($out, '-'));
        $out = preg_replace("/[\/_| -]+/", '-', $out);

        $equal = 0;
        if($id == null){
            $prod = Productos::where('slug', $out)->first();
        }else{
            $prod = Productos::where('slug', $out)->where('id_producto', '!=', $id)->first();
        }

        while(!empty($prod))
        {
            $equal++;
            $outprueba = $out.'-'.$equal;
            $prod = Productos::where('slug', $outprueba)->first();

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
        if($data['id_subcategoria'] == null){
            $prod = Productos::where('slug', $out)->first();
        }else{
            $prod = Productos::where('slug', $out)->where('subcategoria_id', $data['id_subcategoria'])->first();
        }

        while(!empty($prod))
        {
            $equal++;
            $outprueba = $out.'-'.$equal;
            $prod = Productos::where('slug', $outprueba)->first();

            if(empty($prod))
            {
                $out = $out.'-'.$equal;
                return $out;
            }
        }

        return $out;

    }

    public function desactivarproducto($id){

        $item = Productos::where('id_producto',$id)->first();

        if($item->visible==1){

            $producto = Productos::where('id_producto',$id)
                ->update([
                    'visible' => 0
                ]);

        }else{

            $producto = Productos::where('id_producto',$id)
                ->update([
                    'visible' => 1
                ]);

        }

        return $producto;

    }


}
