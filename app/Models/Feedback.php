<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['candidat_id', 'commentaire'];

    // Définir la relation avec le modèle Candidat
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
