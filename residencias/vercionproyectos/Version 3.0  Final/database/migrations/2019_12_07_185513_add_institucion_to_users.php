<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstitucionToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::table('users', function (Blueprint $table) {
            $table->integer('instituciones_id')->nullable();
            $table->integer('campus_id')->nullable();
            $table->string('promedio')->nullable();
            $table->string('carrera')->nullable();
            $table->string('puesto')->nullable();
            $table->string('grado_academico')->nullable();
            $table->string('genero')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
