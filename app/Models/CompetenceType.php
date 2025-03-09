<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenceType extends Model
{
    use HasFactory;

    protected $fillable = ['competence', 'type_competence'];

    public function competence()
    {
        return $this->belongsTo(Competence::class, 'type_competence');
    }
}
