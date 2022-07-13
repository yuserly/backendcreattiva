<?php

namespace App\Http\Controllers;

use App\Models\DetalleVentas;
use App\Models\Dolar;
use App\Models\Empresas;
use App\Models\Periodos;
use App\Models\Productos;
use App\Models\Servicios;
use App\Models\Cupones;
use App\Models\User;
use App\Models\Ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Transbank\Webpay\Oneclick\MallInscription;
use Transbank\Webpay\Oneclick;
use Transbank\Webpay\Oneclick\MallTransaction;

date_default_timezone_set("America/Santiago");

class ServiciosController extends Controller
{
    public function showpendpago($id){
        return Servicios::where([['empresa_id',$id], ['estado_id', 1]])->with('detalleventa','detalleventa.venta', 'periodo')->get();
    }

    public function show($id, $subcategoria){

        $serviciossub = [];
        $servicios = Servicios::where([['empresa_id',$id], ['estado_id', '!=' ,1]])->with('detalleventa','detalleventa.venta', 'periodo', 'productos','productos.subcategoria')->get();
        if(!empty($servicios)){
            foreach ($servicios as $key => $value) {
                if($value["productos"]["subcategoria"]["slug"] == $subcategoria){
                    array_push($serviciossub, $value);
                }
            }
        }

        return $serviciossub;

    }
    public function crearservicio(Request $request){

        $empresa = Empresas::where('email', $request->datos["email"])->first();
        $esvalido = 0;
        $tienehosting = $this->consultarServicios($empresa->id_empresa);

        if(isset($empresa)){

            if($empresa->tipo == 0){

                if(isset($empresa->rut) &&
                    isset($empresa->email) &&
                    isset($empresa->telefono) &&
                    isset($empresa->email_empresa) &&
                    isset($empresa->telefono_empresa) &&
                    isset($empresa->nombre) &&
                    isset($empresa->direccion) &&
                    isset($empresa->region) &&
                    isset($empresa->comuna) ){

                        $esvalido = 1;

                }else{
                   $empresa =  $this->crearempresa($request->datos);

                   if(isset($empresa)){

                        $esvalido = 1;
                   }
                }

            }else{

                if(isset($empresa->rut) &&
                    isset($empresa->email) &&
                    isset($empresa->telefono) &&
                    isset($empresa->email_empresa) &&
                    isset($empresa->telefono_empresa) &&
                    isset($empresa->nombre) &&
                    isset($empresa->direccion) &&
                    isset($empresa->razonsocial) &&
                    isset($empresa->giro) &&
                    isset($empresa->region) &&
                    isset($empresa->comuna) ){

                        $esvalido = 1;

                }else{

                   $empresa =  $this->crearempresa($request->datos);

                   if(isset($empresa)){

                        $esvalido = 1;

                   }

                }
            }

        }else{

            $empresa =  $this->crearempresa($request->datos);
            $esvalido = 1;
        }

        if($esvalido == 1){

            // creamos la venta

            $codeventa = Ventas::max('codigo');

            if(isset($codeventa)){
                $codeventa = $codeventa + 1;
            }else{
                $codeventa = 100000;
            }

            // consultamos el precio del dolar

            $dolar = Dolar::latest()
                            ->first();

            // realizamos los calculos

            $neto = 0;
            $iva = 0;
            $total = 0;
            $descuento = 0;
            $cupondescuento = 0;
            $contDominios = 0;

            foreach ($request->carro as $key => $value) {

                //datos producto
                $producto = Productos::where('id_producto', $value["producto"]["id_producto"])->first();

                //periodo producto
                $periodo = Periodos::where('id_periodo', $value["periodo"])->first();

                if($value["producto"]["subcategoria_id"]==31){ //dominios

                    $hayhosting = false;
                    $cumpleperiodo = false;

                    foreach ($request->carro as $key1 => $value1) {

                        if($value1["producto"]["subcategoria_id"]==1){

                            $hayhosting = true;

                            if($value1["periodo"]== 3 || $value1["periodo"]== 4){
                                $cumpleperiodo = true;
                            }

                        }

                    }


                    if( $hayhosting && $tienehosting["status"] == false && $cumpleperiodo){

                        $contDominios ++;

                        if($contDominios == 1){

                            foreach ($value["periodos"] as $key3 => $value3) {
                               if($value3["id_periodo"] == 2){
                                    $descuentof = $value3["precio"];
                                    \Log::debug('Descuento dominio ' . $descuentof);
                               }
                            }
                        }else{
                            $descuentof = 0;
                        }

                    }else{

                        $descuentof = 0;

                    }

                }else{

                    //descuento aplicable al producto
                    $descuentof = (($producto["precio"] * $periodo["meses"]) * $periodo["descuento"]) / 100;

                }


                $precio_unitario = ($producto["precio"] * $periodo["meses"]);

                $precio_mensual = $producto["precio"];

                $neto += ($precio_unitario - $descuentof);

                $descuento = round($descuento + $descuentof);

                if(isset($value["code_cupon_descuento"]) && $value["cupon_descuento"]>0){

                    //validar cupones
                    $cupon = Cupones::where([
                        ['cupon','=',$value["code_cupon_descuento"]]
                    ])->first();

                    if($cupon){

                        if($cupon->uso_actual<$cupon->uso_max){

                            if($cupon->tipo_descuento_id==1){

                                $cupondescuento = round($cupon->valor*-1);

                            }elseif($cupon->tipo_descuento_id==2){

                                $cupondescuento = round((($precio_unitario*$cupon->valor)*100)*-1);

                            }

                            Cupones::where([
                                ['cupon','=',$value["code_cupon_descuento"]]
                            ])->update(['uso_actual' => ($cupon->uso_actual+1)]);

                        }else{
                            $cupondescuento = 0;
                        }

                    }else{
                        $cupondescuento = 0;
                    }
                }

            }

            $neto = $neto + $cupondescuento;
            $iva = round($neto * 0.19);
            $total = $neto + $iva;

            $total_usd = round($total/$dolar->precio);

            $venta = Ventas::create([
                                'codigo' => $codeventa,
                                'neto' => $neto,
                                'descuento' => $descuento,
                                'iva' => $iva,
                                'total_peso' => $total,
                                'total_usd' => $total_usd,
                                'precio_usd' => $dolar->precio,
                                'precio_uf' => 0,
                                'empresa_id' => $empresa->id_empresa,
                                'metodo_pago' => $request->datos['mediopago'],
                            ]);
            $contDominios = 0;
            foreach ($request->carro as $key => $value) {

                $producto = Productos::where('id_producto', $value["producto"]["id_producto"])->first();
                $periodo = Periodos::where('id_periodo', $value["periodo"])->first();
                $precio_unitario = ($producto["precio"] * $periodo["meses"]);
                $precio_mensual = $producto["precio"];

                // descuento para el dominio

                if($value["producto"]["subcategoria_id"]==31){ //dominios
                    
                    $hayhosting = false;
                    $cumpleperiodo = false;

                    foreach ($request->carro as $key1 => $value1) {

                        if($value1["producto"]["subcategoria_id"]==1){

                            $hayhosting = true;

                            if($value1["periodo"]== 3 || $value1["periodo"]== 4){
                                $cumpleperiodo = true;
                            }

                        }

                    }

                    if( $hayhosting && $tienehosting["status"] == false && $cumpleperiodo){

                        $contDominios ++;

                        if($contDominios == 1){

                            foreach ($value["periodos"] as $key3 => $value3) {
                               if($value3["id_periodo"] == 2){
                                    $descuento = $value3["precio"];
                                    $precio_descuento = round(($producto["precio"] * $periodo["meses"]) - $descuento);

                               }
                            }
                        }else{
                            $descuento = 0;
                            $precio_descuento = round(($producto["precio"] * $periodo["meses"]) - $descuento);

                        }

                    }else{

                        $descuento = 0;
                        $precio_descuento = round(($producto["precio"] * $periodo["meses"]) - $descuento);

                    }


                }else{

                    //descuento aplicable al producto
                    $descuento = (($producto["precio"] * $periodo["meses"]) * $periodo["descuento"]) / 100;
                    $precio_descuento = round(($producto["precio"] * $periodo["meses"]) - $descuento);

                }

                // creamos el/los servicios

                $glosa = $value["producto"]["nombre"].' '.$value["dominio"];

                if($value["sistemaoperativo"] == 0){
                    $sis = null;
                }else{
                    $sis = $value["sistemaoperativo"];
                }

                if($value["versionsistema"] == 0){
                    $version = null;
                }else{
                    $version = $value["versionsistema"];
                }

                $servicio = Servicios::create([
                                    'codigo_venta' => $venta->codigo,
                                    'glosa' => $glosa,
                                    'cantidad' => 1,
                                    'producto_id' => $value["producto"]["id_producto"],
                                    'periodo_id' => $value["periodo"],
                                    'os_id' => $sis,
                                    'version_id' => $version,
                                    'administrado' => $value["administrar"],
                                    'ip' => $value["ip"],
                                    'dominio' => $value["dominio"],
                                    'fecha_inscripcion'=> date('Y-m-d H:i:s'),
                                    'empresa_id' => $empresa->id_empresa
                                    ]);
                 // creamos el detalle de la venta

                 $detalle = DetalleVentas::create([
                                    'cantidad' => 1,
                                    'precio_mensual' => $precio_mensual,
                                    'precio_unitario' => $precio_unitario,
                                    'descuento' => $descuento,
                                    'precio_descuento' => $precio_descuento,
                                    'precio_pagado' => $precio_descuento,
                                    'venta_id' => $venta->id_venta,
                                    'servicio_id' => $servicio->id_servicio
                                ]);

            }

           if($request->datos['mediopago'] == 1){
             return $this->pagowebpay($codeventa,$total,$request->datos['mediopago']);
           }else if($request->datos['mediopago'] == 2){

            return $this->pagopaypal($codeventa,$total_usd,$request->datos['mediopago']);
           }else if($request->datos['mediopago'] == 4){

            return $this->pagooneclick($request->datos, $codeventa, $total);
           }
           else{
            return [
                'url' => '',
                'token' => '',
                'code' => $codeventa,
                'metodopago' => $request->datos['mediopago']
            ];
           }

        }

    }
    public function crearempresa($request){

        $user = User::where('email',$request->email)->first();

        if($user){
            $user_id = $user->id;
        }else{

            $random = Str::random(8);

            $user = User::create([
                'email' => filter_var($request->email, FILTER_SANITIZE_EMAIL),
                'password' => Hash::make($random),
                'username' => trim($request->nombre)
            ]);

            $user_id = $user->id;
        }

        if($request->isempresa){

            $tipo = 1;

        }else{
            $tipo = 0;
        }


        $empresa = Empresas::updateOrCreate(['rut'=>$request->rut],
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

        return $empresa;

    }

    public function pagooneclick($datos, $codeventa, $total){

        $user = User::where('email','=',$datos["email"])->first();

        if(isset($user["tbkuser"])){


            $parentBuyOrder = $codeventa;

            $details = [
                [
                    "commerce_code" => "597055555543",
                    "buy_order" => $codeventa, // Tu propio buyOrder
                    "amount" => $total,
                    "installments_number" => 1
                ],
            ];

            $username = $user["username"];

            $response = (new MallTransaction)->authorize($username, $user["tbkuser"], $parentBuyOrder, $details);

            $codigoventa = $response->getBuyOrder();

                $details = $response->getDetails();
                foreach($details as $detail){
                    $amount = $detail->getAmount();
                    $authorizationCode =  $detail->getAuthorizationCode();
                    $detail->getBuyOrder();
                    $detail->getCommerceCode();
                    $detail->getInstallmentsNumber();
                    $paymentTypeCode = $detail->getPaymentTypeCode();
                    $responseCode = $detail->getResponseCode();
                    $detail->getStatus();
                }

            if($responseCode == 0){

                // si es 0 fue pagado exitosamente

               $this->cambiarestadoventapago($codigoventa);

               return [
                        'metodopago' => $datos['mediopago'],
                        'pagoexitoso' => 1
                        ];

            }else{

                return $this->solicitudinswebpay($user,$datos, $codeventa);

            }

        }else{

            return $this->solicitudinswebpay($user,$datos, $codeventa);

        }

    }

    public function solicitudinswebpay($user, $datos, $codeventa){

            $username = $user["username"];
            // Correo electrónico del usuario
            $email = $user["email"];
            // URL donde llegará el usuario con su token luego de finalizar la inscripción
            $response_url = "http://backendcreattiva.cp/resultado/inscripcion";

            $response = (new MallInscription)->start($username, $email, $response_url);

            Ventas::where('codigo', $codeventa )->update([
                'token_ins_tarjeta' => $response->token
            ]);

            return [
                'token' => $response->token,
                'url' => $response->urlWebpay,
                'metodopago' => $datos['mediopago']
            ];

    }
    public function pagowebpay($codeventa, $monto,$metodopago){

        \Transbank\Webpay\WebpayPlus::configureForIntegration('597055555532', '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C');

        $buy_order = $codeventa;
        $session_id = uniqid();
        $amount = $monto;
        $return_url = "http://backendcreattiva.cp/return/token";

        $response = (new Transaction)->create($buy_order, $session_id, $amount, $return_url);

        if($response->url){

            $url = $response->url;
            $token = $response->token;

            return [
                'url' => $url,
                'token' => $token,
                'code' => $codeventa,
                'metodopago' => $metodopago
            ];

            // agregar el token del pago en la factura

        }

    }

    public function pagopaypal($codeventa, $monto,$metodopago){

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => "http://backendcreattiva.cp/returnsuccess/paypal",
                "cancel_url" => "http://backendcreattiva.cp/returncancel/paypal",
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $monto
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // guardamos el id del pago para saber que venta es

            Ventas::where('codigo', $codeventa)->update([
                'pago_id_paypal'=> $response['id']
            ]);

            // redirect to approve href
            $linkpago = '';
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    $linkpago = $links['href'];
                }
            }

            return [
                'url' => $linkpago,
                'token' => '',
                'code' => $codeventa,
                'metodopago' => $metodopago
            ];
        } else {
            return redirect()->away('http://localhost:4200/pago-rechazado');
        }

    }

    public function validarinscripcion(Request $request){

        $token = $request->TBK_TOKEN;

        $response = (new MallInscription)->finish($token);
        $tbkUser = $response->getTbkUser();
        $tbktarjeta = $response->getCardNumber();

        if($response->responseCode == 0){

            $venta = Ventas::where('token_ins_tarjeta', $token)->with('empresa')->first();

            $userid = $venta->empresa["user_id"];

            User::where('id',$userid)->update([
                'tbkuser' => $tbkUser,
                'tbktarjeta' => $tbktarjeta
            ]);

            $parentBuyOrder = $venta->codigo;

            $details = [
                [
                    "commerce_code" => "597055555543",
                    "buy_order" => $venta->codigo, // Tu propio buyOrder
                    "amount" => $venta->total_peso,
                    "installments_number" => 1
                ],
            ];

            $user = User::where('id',$userid)->first();
            $username = $user->username;

            $response = (new MallTransaction)->authorize($username, $tbkUser, $parentBuyOrder, $details);

            $codigoventa = $response->getBuyOrder();

                $details = $response->getDetails();
                foreach($details as $detail){
                    $amount = $detail->getAmount();
                    $authorizationCode =  $detail->getAuthorizationCode();
                    $detail->getBuyOrder();
                    $detail->getCommerceCode();
                    $detail->getInstallmentsNumber();
                    $paymentTypeCode = $detail->getPaymentTypeCode();
                    $responseCode = $detail->getResponseCode();
                    $detail->getStatus();
                }

            if($responseCode == 0){

                // si es 0 fue pagado exitosamente


               return $this->cambiarestadoventapago($codigoventa);

            }else{

                $codigoventa = $response->getBuyOrder();

                return $this->cambiarestadoventarechazado($codigoventa);

            }

        }else{

            $venta = Ventas::where('token_ins_tarjeta', $token)->with('empresa')->first();

            return $this->cambiarestadoventarechazado($venta->codigo);


        }
    }


    public function validarrpago(Request $request){

        if(isset($request->token_ws) ){
            $token = $request->token_ws;
        }else{
            $token = $request->TBK_TOKEN;
        }

        $response = (new Transaction)->commit($token);

        if($response->responseCode == 0){

            // si es 0 fue pagado exitosamente

            $codigoventa = $response->getBuyOrder();
            $vci = $response->getVci();
            $cardnumber = $response->getCardNumber();
            $authorizationCode = $response->getAuthorizationCode();
            $paymentTypeCode = $response->getPaymentTypeCode();
            $responseCode = $response->getResponseCode();
            $amount = $response->getAmount();

           return $this->cambiarestadoventapago($codigoventa);

        }else{

            $codigoventa = $response->getBuyOrder();

            return $this->cambiarestadoventarechazado($codigoventa);

        }
    }

    public function successTransaction(Request $request)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();


        $response = $provider->capturePaymentOrder($request['token']);

        $venta = Ventas::where('pago_id_paypal', $request['token'])->first();


        $codigoventa = $venta->codigo;

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

           return $this->cambiarestadoventapago($codigoventa);

        } else {

           return $this->cambiarestadoventarechazado($codigoventa);
        }
    }

    public function cancelTransaction(Request $request)
    {
        return redirect()->away('http://localhost:4200/pago-rechazado');
    }

    public function cambiarestadoventapago($codigoventa){

        $venta = Ventas::where('codigo', $codigoventa)->with('detallesventa')->first();

            foreach ($venta["detallesventa"] as $key => $value) {

                $servicio = Servicios::where('id_servicio',$value["servicio_id"])->first();
                $periodo = Periodos::where('id_periodo', $servicio->periodo_id)->first();

                // calcular fecha de renovacion
                $fecha_actual = date("Y-m-d");
                //sumo meses del periodo
                $meses = "+"." ". $periodo->meses . " month";
                $renovacion =  date("Y-m-d",strtotime($fecha_actual."$meses"));

                Servicios::where('id_servicio',$value["servicio_id"])->update([
                            'fecha_inicio' => date('Y-m-d'),
                            'fecha_renovacion' => $renovacion,
                            'estado_id'=> 2
                ]);

            }

            Ventas::where('codigo', $codigoventa)->update([
                        'estado_id'=> 2,
                        'fecha_pago' => date('Y-m-d'),
                        'hora_pago' => date('H:i:s'),
                    ]);

             return redirect()->away('http://localhost:4200/pago-exitoso');
             //return redirect()->away('https://creattiva.t2.creattivadatacenter.com/pago-exitoso');

    }

    public function cambiarestadoventarechazado($codigoventa){

        $venta = Ventas::where('codigo', $codigoventa)->with('detallesventa')->get();

            foreach ($venta["detallesventa"] as $key => $value) {

                Servicios::where('id_servicio',$value["servicio_id"])->update([
                            'estado_id'=> 3
                ]);

            }

            Ventas::where('codigo', $codigoventa)->update([
                'estado_id'=> 3,
                'fecha_pago' => date('Y-m-d'),
                'hora_pago' => date('H:i:s'),
            ]);

            return redirect()->away('http://localhost:4200/pago-rechazado');
            //return redirect()->away('https://creattiva.t2.creattivadatacenter.com/pago-rechazado');


    }

    public function pagarventa(Request $request){

        $venta = Ventas::where('id_venta', $request->id_venta)->first();

        $codeventa = $venta->codigo;
        $mediopago = $request->mediopago;
        if($mediopago == 1){
        $total = $venta->total_peso;

        return $this->pagowebpay($codeventa,$total,$mediopago);
        }else{
        $total = $venta->total_usd;

        return $this->pagopaypal($codeventa,$total,$mediopago);
        }

    }

    public function consultarServicios($id_empresa){

        /*$servicios = Servicios::where([
                                        ['empresa_id','=',$id_empresa],
                                        ['estado_id','=',2]

                                        ])->get();*/
        $servicios = Servicios::where('empresa_id','=',$id_empresa)->where('estado_id','=',2)->get();

        $existe = false;
        if(count($servicios)>0){

            foreach($servicios as $key => $value){

                $producto = Productos::where('id_producto', $value['producto_id'])->first();
                if($producto->subcategoria_id==1){ //productos hosting
                    $existe = true;
                }

            }

        }else{

            $existe = false;

        }


        return ['status'=>$existe];

    }
}
