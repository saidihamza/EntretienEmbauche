<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceTypesTable extends Migration
{
    public function up()
    {
        Schema::create('competence_types', function (Blueprint $table) {
            $table->id();
            $table->string('competence'); // Nom de la compétence
            $table->foreignId('type_competence')->constrained('competences')->onDelete('cascade'); // Référence à la table competences (ID de la compétence)
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('competence_types');
    }
}
