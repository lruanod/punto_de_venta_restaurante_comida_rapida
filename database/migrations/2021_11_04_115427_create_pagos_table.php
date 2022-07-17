<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('total',12,2);
            $table->double('cambio',12,2);
            $table->double('efectivo',12,2);
            $table->double('descuento',12,2);
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
