<?php

// database/migrations/xxxx_xx_xx_create_competences_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetencesTable extends Migration
{
    public function up()
    {
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_candidat');
            $table->string('nom');
            $table->timestamps();

            $table->foreign('id_candidat')->references('id')->on('candidats')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('competences');
    }
}
