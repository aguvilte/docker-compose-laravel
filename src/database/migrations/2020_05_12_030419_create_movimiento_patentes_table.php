<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoPatentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_patentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patente_id');
            $table->string('precision')->nullable();
            
            $table->foreign('patente_id')->references('id')->on('patentes');
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
        Schema::dropIfExists('movimiento_patentes');
    }
}
