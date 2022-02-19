<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVentas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_venta';

    protected $fillable = [
            'cantidad',
            'precio_mensual',
            'precio_unitario',
            'descuento',
            'precio_descuento',
            'precio_pagado',
            'venta_id',
            'servicio_id'
    ];
}
