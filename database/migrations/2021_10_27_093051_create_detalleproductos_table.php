<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleproductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleproductos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('detalle_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->timestamps();

            $table->foreign('detalle_id')->references('id')->on('detalles');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalleproductos');
    }
}
