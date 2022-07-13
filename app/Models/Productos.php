<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $primaryKey = "id_producto";

    protected $fillable = [
        'nombre',
        'slug',
        'meta_title',
        'meta_description',
        'meta_key',
        'precio',
        'visible',
        'subcategoria_id',
        'tipo_producto_id'
    ];

    public function caracteristicas(){

        return $this->hasMany(CarateristicassProductos::class,'producto_id','id_producto');
    }

    public function subcategoria(){

        return $this->hasOne(Subcategorias::class,'id_subcategoria','subcategoria_id');
    }
}
