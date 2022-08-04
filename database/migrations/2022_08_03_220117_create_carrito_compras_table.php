<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_compras', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->decimal('sub_total',11,2);
            $table->decimal('igv',11,2);
            $table->decimal('total',11,2);
            $table->char('estado');
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
        Schema::dropIfExists('carrito_compras');
    }
}
