<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['competence']; // Add your fillable columns here

    // Define the relationship with CompetenceType
    public function competenceTypes()
    {
        return $this->hasMany(CompetenceType::class, 'competence', 'competence');
    }
}
