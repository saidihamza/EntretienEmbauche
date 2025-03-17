<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('poste');
            $table->string('societe');
            $table->string('periode');
            
            // Vérifier si la table 'candidats' existe et que 'id' est bien une colonne 'unsignedBigInteger'
            $table->unsignedBigInteger('id_candidat'); // On assure ici que c'est le bon type.
            $table->foreign('id_candidat') // Spécification explicite de la clé étrangère
                  ->references('id') // Référence à la colonne 'id' de la table 'candidats'
                  ->on('candidats') // Table référencée
                  ->onDelete('cascade'); // On supprime les expériences si le candidat est supprimé.
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
