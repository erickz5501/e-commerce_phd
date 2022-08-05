<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('short_descripcion')->nullable();
            $table->text('descripcion');
            $table->decimal('precio_venta');
            $table->decimal('precio_descuento')->nullable();
            $table->string('SKU');
            $table->enum('stock_estado', ['enstock','sinstock']);
            $table->boolean('destacado')->default(false);
            $table->unsignedInteger('cantidad')->default(10);
            $table->string('imagen')->nullable();
            $table->text('imagenes')->nullable();
            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
