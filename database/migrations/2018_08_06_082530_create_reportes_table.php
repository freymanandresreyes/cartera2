<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('telefono')->nullable();
            $table->string('nit')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('factura')->nullable();
            $table->float('acuerdo')->nullable();                        
            $table->integer('id_canal')->unsigned()->nullable();
            $table->integer('parametro')->unsigned()->nullable();
            $table->foreign('id_canal')->references('id')->on('canales');
            $table->foreign('parametro')->references('id')->on('parametros');
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
        Schema::dropIfExists('reportes');
    }
}
