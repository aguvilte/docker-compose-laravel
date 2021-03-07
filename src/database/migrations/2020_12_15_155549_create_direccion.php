<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('denuncia_id');
            $table->string('barrio');
            $table->string('calle')->nullable();
            $table->integer('numero')->nullable();
            $table->foreign('denuncia_id')->references('id')->on('denuncias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('direccion');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
