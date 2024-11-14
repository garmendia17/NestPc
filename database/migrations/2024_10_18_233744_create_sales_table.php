<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // Crea el ID incrementable
            $table->string('nombre_cliente'); // Nombre del cliente
            $table->unsignedBigInteger('producto_id'); // ID del producto
            $table->integer('cantidad'); // Cantidad
            $table->decimal('total', 10, 2); // Total
            $table->timestamps(); // Marca de tiempo para created_at y updated_at

            // Asegúrate de que el ID del producto esté relacionado con la tabla de productos
            $table->foreign('producto_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
