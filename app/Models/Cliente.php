<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // nombre del cliente
        'email',  // correo electrónico del cliente
        'telefono', // número de teléfono del cliente
        'direccion' // dirección del cliente
    ];

    // Relación con facturas
    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
