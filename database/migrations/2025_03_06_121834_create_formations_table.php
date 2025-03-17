<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('diplome');
            $table->string('formation');
            $table->string('universite');
            $table->year('annee_obtention');
            $table->foreignId('id_candidat')->constrained('candidats')->onDelete('cascade'); // Assurez-vous que la table `candidats` existe
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
