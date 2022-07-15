<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarateristicassProductos extends Model
{
    use HasFactory;
    protected $primaryKey="id_carateristica_producto";

    protected $fillable = [
            
        'nombre',
        'capacidad',
        'producto_id'
    
    ];
}
