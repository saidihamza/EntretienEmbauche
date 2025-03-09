<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    // Définir la table si elle diffère du nom par défaut (si la table n'est pas 'candidats')
    // protected $table = 'nom_de_votre_table';

    // Mass assignment protection
    protected $fillable = [
        'first_name',
        'date_of_birth',
        'gender',
        'email',
        'phone_number',
        'marital_status',
        'motorized',
        'has_driving_license',
        'has_visa',
        'categorie',
        'cv_source',
        'cv_upload',
        'comment',
    ];

    // Pour garantir que les dates sont automatiquement castées en objets Carbon (par exemple, date_of_birth)
    protected $dates = [
        'date_of_birth',
    ];

    // Définir des accès personnalisés pour la gestion des données sensibles
    protected $casts = [
        'motorized' => 'boolean',
        'has_driving_license' => 'boolean',
        'has_visa' => 'boolean',
        'cv_upload' => 'string', // Si vous souhaitez gérer le chemin du fichier téléchargé
    ];

    // Validation personnalisée, méthodes supplémentaires ou relations peuvent être ajoutées ici
}
