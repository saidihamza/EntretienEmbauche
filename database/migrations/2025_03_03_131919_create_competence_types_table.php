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
            
            // Clef étrangère vers la table 'competences'
            $table->unsignedBigInteger('competence_id');
            $table->string('type_competence'); // Par exemple: "Technique", "Comportementale", etc.

            // Déclaration de la foreign key correctement formée
            $table->foreign('competence_id')
                  ->references('id')
                  ->on('competences')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        // Toujours supprimer la foreign key avant de drop la table pour éviter des erreurs
        Schema::table('competence_types', function (Blueprint $table) {
            $table->dropForeign(['competence_id']);
        });

        Schema::dropIfExists('competence_types');
    }
}
