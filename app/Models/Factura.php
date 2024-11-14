<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Producto;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas'; 

    protected $fillable = [
        'cliente_id',     
        'nombre_cliente',
        'monto_total',   
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    // Relación con productos si cada factura tiene productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'factura_productos', 'factura_id', 'producto_id')
                    ->withPivot('cantidad', 'precio_unitario'); // Si se guarda cantidad y precio en la tabla intermedia
    }
}
