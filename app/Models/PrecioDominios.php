<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrecioDominios extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_precio';
    protected $connection = 'mysql_facturacion';
    public $table = 'precio_dominio_comprarapida';
}
