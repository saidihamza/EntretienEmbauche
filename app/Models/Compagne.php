<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagne extends Model
{
    use HasFactory;
        /**
     * Les attributs pouvant être remplis via un formulaire.
     */
    protected $fillable = ['libelle', 'date_debut', 'date_fin'];

    /**
     * Les attributs à caster en types natifs.
     */
    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];
}
