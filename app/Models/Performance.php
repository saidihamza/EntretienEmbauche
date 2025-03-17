<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    protected $fillable = ['employee_name', 'score', 'comments'];

    // Vous pouvez ajouter d'autres relations ou méthodes si nécessaire
}
