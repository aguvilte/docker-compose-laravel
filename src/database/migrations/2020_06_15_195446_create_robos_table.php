<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRobosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('denuncia_id');
            $table->string("numero_patente");
            $table->dateTime("fecha_hora");
            $table->text("descripcion");
            
            $table->foreign('denuncia_id')->references('id')->on('denuncias');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('robos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
