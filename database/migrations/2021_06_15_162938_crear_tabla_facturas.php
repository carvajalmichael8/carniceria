<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('num_factura',20)->unique();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('num_pago');
            $table->timestamps();
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('num_pago')->references('id')->on('modos_pagos')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
