<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostulacionesCreattiva extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'cargo',
        'ip',
        'pdf'
    ];
}
