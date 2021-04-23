<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('apaterno',30);
            $table->string('amaterno',30);
            $table->bigInteger('numero');
            $table->bigInteger('numero_tutor');
            $table->unsignedBigInteger('grupo_id');
            $table->timestamps();
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
