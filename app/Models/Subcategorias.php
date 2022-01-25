<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    use HasFactory;

    protected $primaryKey="id_subcategoria";
    protected $fillable = [
        'nombre',
        'slug',
        'icono',
        'categoria_id'
    ];

    public function categoria(){

        return $this->hasOne(Categorias::class,'id_categoria','categoria_id');
    }
}
