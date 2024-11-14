<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas'; 

    public $timestamps= false;

    protected $fillable = [
        'nombre_cliente', // Asegúrate de incluir este campo
        'producto_id',
        'cantidad',
        'total', // Asegúrate de incluir este campo
    ];

    public function producto()
    {
        return $this->belongsTo(Product::class);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id'); // Asegúrate de que 'cliente_id' es el nombre correcto de la columna en la tabla 'ventas'
    }
    
}
