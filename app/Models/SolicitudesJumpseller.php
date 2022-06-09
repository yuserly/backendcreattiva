<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudesJumpseller extends Model
{
    use HasFactory;
    protected $primaryKey = "id";

     protected $fillable = [
        'email',
        'tipocliente',
        'nombrecliente',
        'urlweb',
        'rut',
        'telefono',
        'giro',
        'direccion',
        'nombretienda',
        'idproducto',
        'idperiodo',
        'ip',
        'status'
    ];
}
