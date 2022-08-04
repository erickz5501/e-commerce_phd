<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_carrito', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->decimal('precio_unitario',11,2);
            $table->decimal('descuento',11,2);
            $table->decimal('sub_total',11,2);
            $table->unsignedInteger('carrito_compras_id');
            $table->foreign('carito_compras_id')->references('id')->on('carrito_compras');
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('producto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_carrito');
    }
}
