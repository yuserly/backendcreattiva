<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoriasHasPeriodos extends Model
{
    use HasFactory;

    protected $primaryKey= 'id_sub_has_periodo';

   protected $fillable = [
        'subcategoria_id',
        'periodo_id'
    ];
}
