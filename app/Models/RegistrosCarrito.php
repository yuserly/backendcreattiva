<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrosCarrito extends Model
{
    use HasFactory;
    protected $primaryKey= 'id_carrito';

    protected $fillable = [
            'ip_visitante',
            'sitio',
            'cliente_id',
            'fecha',
            'hora',
            'notificacion',
            'status_compra'
    ];
}
