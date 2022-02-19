<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;
    protected $primaryKey= 'id_servicio';

    protected $fillable = [
            'codigo_venta',
            'glosa',
            'cantidad',
            'producto_id',
            'producto_id',
            'periodo_id',
            'periodo_id',
            'os_id',
            'version_id',
            'administrado',
            'ip',
            'dominio',
            'fecha_inscripcion',
            'fecha_inicio',
            'fecha_renovacion',
            'empresa_id'
    ];
}
