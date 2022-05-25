<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesRegistrosCarrito extends Model
{
    use HasFactory;
    protected $primaryKey= 'id';

    protected $fillable = [
            'carrito_id',
            'subcategoria_id',
            'producto_id',
            'nombre',
            'email',
            'telefono',
            'porcentaje_desc',
            'url',
            'dominio',
            'ip_server',
            'fecha',
            'hora'
    ];


}
