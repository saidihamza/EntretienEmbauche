<?php

// app/Models/Competence.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['id_candidat', 'nom'];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
