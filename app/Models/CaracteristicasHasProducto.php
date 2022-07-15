<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicasHasProducto extends Model
{
    use HasFactory;

    protected $primaryKey="id";

    protected $fillable = [
        'producto_id',
        'carateristica_producto_id'
    ];
}
