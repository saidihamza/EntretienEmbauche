<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Identifiant unique de l'événement
            $table->string('title'); // Titre de l'événement (candidat)
            $table->string('event_type'); // Type d'événement (ex : Entretien, Contrat, Autre)
            $table->string('candidate'); // Candidat
            $table->string('interview_type'); // Type d'entretien
            $table->string('evaluator'); // Évaluateur
            $table->dateTime('start'); // Date de début
            $table->dateTime('end')->nullable(); // Date de fin (nullable)
            $table->timestamps(); // Dates de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
