<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente');
            $table->unsignedBigInteger('producto_id'); // Asegúrate de que sea unsignedBigInteger
            $table->integer('cantidad');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('producto_id')
                ->references('id')->on('products') // Cambiado a 'products'
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
