<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'diplome',
        'formation',
        'universite',
        'annee_obtention',
        'id_candidat',
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'id_candidat');
    }
}
