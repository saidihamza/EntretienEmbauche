<?php

// app/Models/Entretien.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    use HasFactory;

    // Définir les champs qui peuvent être remplis via l'assignation de masse
    protected $fillable = [
        'nom',
        'email',
        'date_entretien',
        'type_entretien',
        'categorie',
        'candidat_tel',
        'entretien', // Assurez-vous d'inclure tous les champs nécessaires
    ];
}
