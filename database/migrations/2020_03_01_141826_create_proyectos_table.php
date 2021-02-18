<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("titulo");
            $table->text("descripcion");
            $table->string("shortDescripcion");
            $table->string("imagenPath");
            $table->string("videoPath");
            $table->date("fechaInicio");
            $table->date("fechaFin");
            $table->double('objetivo', 8, 2);
            $table->double('minDonacion', 8, 2);
            $table->double('maxDonacion', 8, 2);
            $table->double('donacionPorDefecto', 8, 2);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('proyectos');
    }
}
