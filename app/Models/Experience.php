<?php

// app/Models/Experience.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'poste',
        'societe',
        'periode',
        'id_candidat',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'id_candidat');
    }
}
