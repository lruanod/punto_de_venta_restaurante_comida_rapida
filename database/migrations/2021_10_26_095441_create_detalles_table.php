<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->double('preciodetalle',12,2);
            $table->double('descuento',12,2);
            $table->double('subtotal',12,2);
            $table->text('observacion',300);
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('pedido_id');
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('pedido_id')->references('id')->on('pedidos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
}
