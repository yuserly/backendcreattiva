<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $primaryKey = "id_producto";

    public function caracteristicas(){

        return $this->hasMany(CarateristicassProductos::class,'producto_id','id_producto');
    }

    public function subcategoria(){

        return $this->hasOne(Subcategorias::class,'id_subcategoria','subcategoria_id');
    }
}
