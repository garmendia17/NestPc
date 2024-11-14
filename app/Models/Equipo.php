<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table= 'products';

    protected $fillable = [
        'nombre',
        'modelo',
        'estado',
        'stock',
        'precio'
    ];
}
